<?php
include($_SERVER['DOCUMENT_ROOT'].'/core/sec/cdb.php');
if(empty($_GET['str'])){
    responseJSON(false,"Bad request");
}
responseJSON(true,hash("sha3-512",$_GET['str']));
?>