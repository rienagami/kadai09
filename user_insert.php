<?php

if(
!isset($_POST["name"]) || $_POST["name"]=="" ||
!isset($_POST["email"]) || $_POST["email"]=="" ||
!isset($_POST["lid"]) || $_POST["lid"]=="" ||
!isset($_POST["lpw"]) || $_POST["lpw"]==""
    ){
    exit('ParamError');
}

//1.POSTデータ取得
$name  = $_POST["name"];
$email = $_POST["email"];
$lid   = $_POST["lid"];
$lpw   = $_POST["lpw"];


//DB接続

try{
    $pdo = new
 PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
}catch(PDOEception $e) {
exit('DbConnectError:'.$e->getMessage());
}

//データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, email, lid, lpw, indate)VALUES(NULL, :name, :email, :lid, :lpw, sysdate())");

$stmt->bindValue(':name',$name);
$stmt->bindValue(':email',$email);
$stmt->bindValue(':lid',$lid);
$stmt->bindValue(':lpw',$lpw);
$status = $stmt->execute();

//データ登録処理後もしエラーがあれば・・・

if($status==false){
    $error = $stmt->errorInfo();
    exit("QuerryError:".$error[2]);
}else{
    header("Location: user_index.php");
    exit;
}

?>
