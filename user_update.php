<?php

//POSTでParamを取得
$id        = $_POST["id"];
$name      = $_POST["name"];
$email     = $_POST["email"];
$lid       = $_POST["lid"];
$lpw       = $_POST["lpw"];


//DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// UPDATE gs_an_table SET   ;で更新（bindValue)
//基本的にinsert.phpの処理の流れらしい
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, email=:email, lid=:lid, lpw=:lpw, WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: user_select.php");
    exit;
}

?>