<?php
//session_startは必ず最初に記述
session_start();

//SESSIONを初期化(空っぽにする)
$_SESSION = array();

//Cookieに保存してある"sessionID"の保存期間を過去にして破棄

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000,'/');
}

//サーバ側でのセッションIDの破棄
session_destroy();

//処理後、リダイレクト
header("Location: login.php");
exit();

?>