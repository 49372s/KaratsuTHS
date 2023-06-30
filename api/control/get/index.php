<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/sec/cdb.php');
//リクエストヘッダをＪＳＯＮにする
header('Content-Type: application/json;charset=UTF-8;');

$pdo = cdb();
foreach($pdo->query("SELECT * FROM ks") as $val){
    if($val[5]=="1"){
        responseJSON(true,array("id"=>$val[0]));
    }
}
?>