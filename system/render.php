<?php

class Render{

    public static function ren($filepath,$params=array()){

        ob_start();
        extract($params);
        require_once ($filepath);
        $theme=ob_get_clean();

        require_once ('mvc/view/theme.php');

    }

    public static function particialren($filepath,$params=array()){
        extract($params);
        require_once ($filepath);
    }

}