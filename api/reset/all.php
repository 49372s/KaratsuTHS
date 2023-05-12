<?php
include('../../core/sec/cdb.php');
$pdo = cdb();
$adm = new PDO("mysql:host=localhost:3306;charset=UTF8","root","digj-jhs038");
$dbname = getAuthenticate()['dbname'];
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname';";
//$sql = "SELECT * from"
foreach($adm->query($sql) as $val){
    echo($val[0]);
}
?>