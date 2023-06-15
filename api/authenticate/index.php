<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/sec/cdb.php');
//リクエストヘッダをＪＳＯＮにする
header('Content-Type: application/json;charset=UTF-8;');
//認証フィールド
//GETにIDやTokenが含まれていない場合
if(empty($_GET['id']) || empty($_GET['token'])){
    //リクエスト不良としてデータを返す
    responseJSON(false,"Bad request");
}
//パスワードを読み込む
$tmp = getAuthenticateInfo();
//認証
if($_GET['id']!=$tmp['user'] || $_GET['token']!=$tmp['pass']){
    //認証失敗
    responseJSON(false,"Authenticate failed.");
}
//認証成功してるっぽいのでトークンを返す

$token = md5($tmp['pass']);
$now = date('YmdHi');
$token = md5($token.$now);
responseJSON(true,$token);
?>