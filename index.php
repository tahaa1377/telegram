<?
require_once ('system/loader.php');

$uri= $_SERVER['REQUEST_URI'];

$uri=str_replace("/telegram/","",$uri);
//
global $taha;

$records=$taha['domain'];

foreach ($records as $key => $value){

if (preg_match($key,$uri)){
$uri=preg_replace($key,$value,$uri);
}
}
//
$parts=explode("/",$uri);

$classname=$parts[0];
$method=$parts[1];

$params=array();
for ($i=2;$i<count($parts);$i++){
$params[]=$parts[$i];
}


$classname1=ucfirst($classname)."Controller";

//auto_load

$re=new $classname1();

call_user_func_array(array($re,$method),$params);
