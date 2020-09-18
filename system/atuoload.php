<?
function __autoload($classname) {


    if (strpos($classname, 'Controller') !== false) {

        $CLAS=str_replace("Controller","",$classname);

        $CLAS=lcfirst($CLAS);

        require_once ("mvc/controller/$CLAS.php");
        return;
    }

    if (strpos($classname, 'Model') !== false) {

        $CLAS=str_replace("Model","",$classname);

        $CLAS=lcfirst($CLAS);

        require_once ("mvc/model/$CLAS.php");
        return;
    }


}