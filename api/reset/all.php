<?php
//データーベース接続情報を読み取る
include('../../core/sec/cdb.php');
$pdo = cdb();
$dbname = getAuthenticate()['dbname'];

$adm = new PDO("mysql:host=".getAuthenticate()['host'].";charset=UTF8",getAuthenticate()["admin"],getAuthenticate()["pwad"]);
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname';";
//$sql = "SELECT * from"
foreach($adm->query($sql) as $val){
    $sql = "DROP TABLE $dbname.".$val[0];
    $adm -> query($sql);
}

?>