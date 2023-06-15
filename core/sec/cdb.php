<?php
//SQL接続情報を返す
function getAuthenticate(){
    include($_SERVER['DOCUMENT_ROOT']."/core/sec/data/key.php");
    return array("host"=>$sql_hostname,"dbname"=>$sql_dbname,"user"=>$sql_user,"pwd"=>$sql_pwd,"admin"=>$sql_admin,"pwad"=>$sql_admpw);
}

//PDOオブジェクトを返す
function cdb(){
    $auth = getAuthenticate();
    return new PDO("mysql:host=".$auth["host"].";dbname=".$auth["dbname"].";charset=UTF8",$auth["user"],$auth["pwd"]);
}

//レスポンスを返す
function responseJSON($flug=false, $data=null){
    //FLUG(成否情報)がTrue（成功）のとき
    if($flug){
        //レスポンスデータがあるとき
        if($data!=null){
            //レスポンスデータを含む成功情報をJSONで返す
            echo json_encode(array("result"=>"success","data"=>$data));
            exit();
        }else{
            //レスポンスデータを含まない成功情報のみをJSONで返す
            echo json_encode(array("result"=>"success"));
            exit();
        }
    }else{
        //レスポンスデータがあるとき
        if($data!=null){
            //まああとは成功情報のやつを参照してください
            echo json_encode(array("result"=>"fail","reason"=>$data));
            exit();
        }else{
            echo json_encode(array("result"=>"fail","reason"=>"Undefined error."));
            exit();
        }
    }
}

//API接続情報（照合用）を返す
function getAuthenticateInfo(){
    include($_SERVER['DOCUMENT_ROOT']."/core/sec/data/key.php");
    $data = array("user"=>hash("sha3-512",$api_user),"pass"=>hash("sha3-512",$api_pwd));
    return $data;
}
?>