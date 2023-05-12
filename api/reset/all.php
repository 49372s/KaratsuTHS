<?php
//データーベース接続情報を読み取る
include('../../core/sec/cdb.php');
//データベースに接続する(一般ユーザー権限)
$pdo = cdb();

//データベース接続情報を読み取る（変数格納）
$dbname = getAuthenticate()['dbname'];

//データベースに接続する(管理者権限)
$adm = new PDO("mysql:host=".getAuthenticate()['host'].";charset=UTF8",getAuthenticate()["admin"],getAuthenticate()["pwad"]);

//現在あるテーブルをすべて削除する
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname';";

//SQLを実行して該当するすべてのテーブルを削除する
foreach($adm->query($sql) as $val){
    $sql = "DROP TABLE $dbname.".$val[0];
    $adm -> query($sql);
}

//テーブルを作成する()
?>