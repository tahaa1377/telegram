<?
class MessageModel{

    public static function getnotofi($id){
        $db = new Db();
        $stmt = $db->pdo->prepare("SELECT count (*) as totla FROM `messages` WHERE messageTo=:id1");
        $stmt->bindParam(':id1', $id);
        $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getMembders($id)
    {

        $db = new Db();

        $stmt = $db->pdo->prepare("SELECT `messageFrom` FROM `messages` WHERE messageTo=:id1");
        $stmt->bindParam(':id1', $id);
        $stmt->execute();

        $a = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $c=array();

        foreach (array_values($a) as $bi){
            if (!in_array($bi['messageFrom'],$c)) {
                $c[]=$bi['messageFrom'];
            }
        }
        $stmt=$db->pdo->prepare("SELECT `messageTo` FROM `messages` WHERE messageFrom=:id1");
        $stmt->bindParam(':id1',$id);
        $stmt->execute();

        $a=$stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach (array_values($a) as $bi){
            if (!in_array($bi['messageTo'],$c)) {
                $c[]=$bi['messageTo'];
            }
        }

        $d=array();
        foreach ($c as $ci){
            $stmt=$db->pdo->prepare("SELECT * FROM `users` WHERE userId=:id2");
            $stmt->bindParam(':id2',$ci);
            $stmt->execute();
            $d[]=$stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $d;
    }

    public static function getmessages($userId, $msgTo)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("SELECT * FROM `messages` WHERE `messageFrom`=:id AND`messageTo`=:id1 or `messageFrom`=:id1 AND`messageTo`=:id");
        $stmt->bindParam(":id",$userId);
        $stmt->bindParam(":id1",$msgTo);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getInfo($msgTo)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("SELECT * FROM `users` WHERE `userId`=:id");
        $stmt->bindParam(":id",$msgTo);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function sendMsg($userId, $msgTo, $Msg,$msgIMG)
    {
        $db=new Db();
        $stmt=$db->pdo->prepare("INSERT INTO `messages` (`messageFrom`, `messageTo`, `message` ,`messageImage`) VALUES (:id,:MSGTO,:MSG,:MSGIMG)");
        $stmt->bindParam(":id",$userId);
        $stmt->bindParam(":MSGTO",$msgTo);
        $stmt->bindParam(":MSG",$Msg);
        $stmt->bindParam(":MSGIMG",$msgIMG);
        $stmt->execute();
    }

    public static function uploadeMsgImage($file)
    {
        $name = $file['name'];
        $ext = explode(".", $name);
        $ext = strtolower(end($ext));
        if (in_array($ext, array('png', 'jpg', 'jpeg'))) {
            $tmp = $file['tmp_name'];
            move_uploaded_file($tmp, 'images/'.$name);
            return 'images/'.$name;
        }else{
            return false;
        }
    }


    public static function getSearch($search1)
    {
        $search='%'.$search1.'%';
        $db=new Db();
        $stmt=$db->pdo->prepare("SELECT * FROM users WHERE username like ?");
        $stmt->bindParam(1,$search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}