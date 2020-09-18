<?php
class MessageController
{

    public function home()
    {

        $data['resultMembers']=MessageModel::getMembders($_SESSION['userId']);
        Render::ren('mvc/view/home/home.php', $data);

    }

    public function getMessages()
    {
        $data['messages'] = MessageModel::getmessages($_SESSION['userId'], $_POST['msgTo']);
        Render::particialren('mvc/view/home/messageForm.php', $data);

    }

    public function getInfo()
    {

        $data['info'] = MessageModel::getInfo($_POST['msgTo']);
        Render::particialren('mvc/view/home/infoform.php', $data);

    }


    public function sendMsg()
    {
        if (isset($_POST) and !empty($_POST)) {

            if (!empty($_POST['text']) and $_FILES['file']['size'] == 0) {
                MessageModel::sendMsg($_SESSION['userId'], $_POST['msgTo'], $_POST['text'], null);
            } else if (empty($_POST['text']) and $_FILES['file']['size'] != 0) {
                if (MessageModel::uploadeMsgImage($_FILES['file']) !== false) {
                    $pathroot = MessageModel::uploadeMsgImage($_FILES['file']);
                    MessageModel::sendMsg($_SESSION['userId'], $_POST['msgTo'], null, $pathroot);
                }
            } else if (!empty($_POST['text']) and $_FILES['file']['size'] != 0) {
                if (MessageModel::uploadeMsgImage($_FILES['file']) !== false) {
                    $pathroot = MessageModel::uploadeMsgImage($_FILES['file']);
                    MessageModel::sendMsg($_SESSION['userId'], $_POST['msgTo'], $_POST['text'], $pathroot);
                }
            }
        }
    }

    public function search()
    {

        $data['infos'] = MessageModel::getSearch($_POST['search1']);
        Render::particialren('mvc/view/home/search.php', $data);

    }

    public function notification(){

        $userId=$_SESSION['userId'];
        $data['notif'] =   MessageModel::getnotofi($userId);

    }

}