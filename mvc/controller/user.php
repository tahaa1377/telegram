<?php
class UserController{

    public function main(){
        if (isset($_POST['l_submit']) and !empty($_POST['l_submit'])){
           $email=$_POST['l_email'];
           $password=$_POST['l_password'];

           if (empty($email) or empty($password)){
               $error['error']="all felid must not empty";
               Render::ren('mvc/view/user/login.php',$error);
               exit();
           }
            $result=UserModel::loginCheack($email,$password);

            if ($result == null){
                $error['error']="your password or email not true";
                Render::ren('mvc/view/user/login.php',$error);
                exit();
            }else{
                $_SESSION['userId']=$result['userId'];
                header("Location: /telegram/home");
            }
        }else  if (isset($_POST['s_submit']) and !empty($_POST['s_submit'])) {
            $name=$_POST['s_name'];
            $username=$_POST['s_username'];
            $email=$_POST['s_email'];
            $password=$_POST['s_password'];
            $file=$_FILES['s_img'];
            if (empty($name) or empty($username) or empty($email) or empty($password)){
                $eroor['error1']="all felid must not empty";
                Render::ren('mvc/view/user/login.php',$eroor);
                exit();
            }
            if ($file['size']==0){
                $path="images/defult.png";
            }else{
                $path=UserModel::pathIMG($file);
            }
            if ($path === false){
                $eroor['error1']="image extention wrong";
                Render::ren('mvc/view/user/login.php',$eroor);
                exit();
            }

            $resultEmail=UserModel::cheacksignupPASSWORD($email);

            if ($resultEmail !=null){
                $eroor['error1']="this email exist";
                Render::ren('mvc/view/user/login.php',$eroor);
                exit();
            }

            $resultUsername=UserModel::cheacksignupUSERNAME($username);

            if ($resultUsername !=null){
                $eroor['error1']="this username exist";
                Render::ren('mvc/view/user/login.php',$eroor);
                exit();
            }
            $_SESSION['userId']=UserModel::signup($name,$email,$password,$username,$path);
            header("Location: /telegram/home");

        }else {
            Render::ren('mvc/view/user/login.php');
        }

    }
    public function logout(){
        session_destroy();
        header("Location: /telegram/main");
    }


    public function editProfile(){

        $data['userInformation']=UserModel::editProfile($_SESSION['userId']);
        Render::ren('mvc/view/user/profile.php',$data);
    }

    public function submitEditProfile(){

        if ($_FILES['edit_file']['size']!=0){

            if (MessageModel::uploadeMsgImage($_FILES['edit_file']) !== false) {
                $path = MessageModel::uploadeMsgImage($_FILES['edit_file']);
                UserModel::editProfile_submited_IMG($_POST['edit_name'], $_POST['edit_username'], $_POST['edit_password'], $path);
            }
            }else{
            UserModel::editProfile_submited($_POST['edit_name'], $_POST['edit_username'], $_POST['edit_password']);
        }
        header("Location: /telegram/home");

    }
}