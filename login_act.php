<?php
session_start();

//外部ファイル読み込み
include("functions.php");

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//DB接続します
$pdo = db_con();


//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw");
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res =stmt->execute();


//SQL実行時にエラーがある場合
if($res==false){
    queryError($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();

//該当レコードがあればSESSIONに値を代入
if( $val["id"] !=""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] =$val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    header("Location: select.php");
}else{
    header("Location: logout.php");
    
}
exit();

?>









