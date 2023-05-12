<?php
function getAuthenticate(){
    include($_SERVER['DOCUMENT_ROOT']."/core/sec/data/key.php");
    return array("host"=>$sql_hostname,"dbname"=>$sql_dbname,"user"=>$sql_user,"pwd"=>$sql_pwd);
}

function cdb(){
    $auth = getAuthenticate();
    return new PDO("mysql:host=".$auth["host"].";dbname=".$auth["dbname"].";charset=UTF8",$auth["user"],$auth["pwd"]);
}
?>