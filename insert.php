<?php
session_start();
include("functions.php");
//入力チェック（受信確認処理追加）
if(
!isset($_POST["name"]) || $_POST["name"]=="" ||
!isset($_POST["email"]) || $_POST["email"]=="" ||
!isset($_POST["naiyou"]) || $_POST["naiyou"]==""){
    exit('ParamError');
    
}

//POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];

//DB接続
$pdo = db_con();

//データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id,name,email,naiyou,indate)VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $name,  PDO::PARAM_STR);

$stmt->bindValue(':a2', $email, PDO::PARAM_STR);

$stmt->bindValue(':a3', $naiyou, PDO::PARAM_STR);

$status = $stmt->execute();


//データ登録処理後
if($status ==false){
    queryError($stmt);
}else{
//index.phpへリダイレクト   
    header("Location:index.php");
}
?>