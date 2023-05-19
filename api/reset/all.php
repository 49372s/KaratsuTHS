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

//テーブルを作成する
// ID, 名前, 種別, 設置区域, 最終監視時間, 状態, 報知種別
$sql = "CREATE TABLE ks(id int(255) not null auto_increment, name varchar(255), model int(255), area varchar(255), lastUpdate varchar(255), status int(255), alart int(255),PRIMARY KEY (id));";
$flug = $pdo->query($sql);
header('Content-Type: application/json; charset=UTF-8;');
if($flug == 1){
    echo json_encode(array("result"=>"success"));
}else{
    echo json_encode(array("result"=>"fail","reason"=>$pdo->errorInfo()));
    exit();
}
?>