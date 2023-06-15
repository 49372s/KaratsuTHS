<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/sec/cdb.php');
//リクエストヘッダをＪＳＯＮにする
header('Content-Type: application/json;charset=UTF-8;');
$tmp = getAuthenticateInfo();
$token = md5($tmp['pass']);
$now = date('YmdHi');
$token = md5($token.$now);
if(empty($_GET['token']) || empty($_GET['id'])){
    responseJSON(false,"Bad request.");
}
if($token == $_GET['token']){
    $pdo = cdb();
    $sql = "UPDATE ks set status = 1 where id=:id";
    $pre = $pdo->prepare($sql);
    $arr = array(":id"=>$_GET['id']);
    $flug = $pre->execute($arr);
    if($flug != 1){
        responseJSON(false);
    }
    responseJSON(true,"fire!");
}else{
    responseJSON(false,"Authenticate failed. Requested token is invaild.");
}
?>