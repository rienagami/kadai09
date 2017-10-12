<?php
session_start();
include("functions.php");
ssidChk();

//POSTでParamを取得
$id     = $_POST["id"];
$id     = $_POST["name"];
$id     = $_POST["email"];
$id     = $_POST["naiyou"];


//DB接続
$pdo = db_con();

// UPDATE gs_an_table SET   ;で更新（bindValue)
//基本的にinsert.phpの処理の流れらしい
$stmt = $pdo->prepare("UPDATE gs_an_table SET name=:name, email=:email, naiyou=:naiyou WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: select.php");
    exit;
}

?>