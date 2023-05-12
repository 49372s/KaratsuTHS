<?php
//変数を宣言
$mode = 0; //0:post 1:get

if(empty($_POST['key'])){
    //もしPOSTでキーが送られてない場合はGETとして判断する
    $mode = 1;
}

?>