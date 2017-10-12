<?php
session_start();


//session_id(); は現在割り振られてる「SESSION ID」を取得する関数ですします。ユニークID。
echo session_id()."<br>";


//1をプラスしてる、そしてecho表示
echo $_SESSION["num"] = $_SESSION["num"] + 1;

$_SESSION["name"]="長神";
$_SESSION["age"]="35";


?>