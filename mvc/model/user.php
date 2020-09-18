<?php
class UserModel{


    public static function loginCheack($email,$password){

        $db=new Db();
        $stmt=$db->pdo->prepare("select * from `users` where email=:email and password=:pass");
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":pass",$password);
        $stmt->execute();

       return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function signup($name, $email, $password, $username, $path)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("INSERT INTO `users`(`name`, `email`, `password`, `username`, `profileImage`) 
                  VALUES (:namee,:email,:password,:username,:path)");
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":namee",$name);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":path",$path);
        $stmt->execute();
       return $db->pdo->lastInsertId();
    }

    public static function pathIMG($file)
    {
        $name = $file['name'];
        $ext = explode(".", $name);
        $ext = strtolower(end($ext));
        if (in_array($ext, array('png', 'jpg', 'jpeg'))) {
            $tmp = $file['tmp_name'];
            move_uploaded_file($tmp, 'images/'.$name);
            return 'images/'.$name;
        }else {
            return false;
        }
    }

    public static function cheacksignupPASSWORD($email)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("select * from `users` where email=:email");
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function cheacksignupUSERNAME($username)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("select * from `users` where username=:email");
        $stmt->bindParam(":email",$email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function editProfile($userId){
        $db=new Db();
        $stmt=$db->pdo->prepare("SELECT * FROM `users` WHERE userId=:id");
        $stmt->bindParam(":id",$userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function editProfile_submited_IMG($name, $username, $password, $path){
        $db=new Db();
        $stmt=$db->pdo->prepare("UPDATE `users` SET `name`=:namee,`password`=:password,`username`=:username,`profileImage`=:path WHERE `userId`=:ID");
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":namee",$name);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":path",$path);
        $stmt->bindParam(":ID",$_SESSION['userId']);
        $stmt->execute();
    }
    public static function editProfile_submited($name, $username, $password){
        $db=new Db();

        $stmt=$db->pdo->prepare("UPDATE `users` SET `name`=:namee,`password`=:password,`username`=:username WHERE `userId`=:ID");
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":namee",$name);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":ID",$_SESSION['userId']);
        $stmt->execute();
    }
}