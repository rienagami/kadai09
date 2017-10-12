<?php

//DB接続関数(PDO)
function db_con(){//DBの名前を変更するときここを変えるだけでいいらしい？？
    $dbname='gs_db_34';
    try {
        $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
}

//SQL処理エラー
function queryError($stmt){
    $error = $stmt->errorInfo();
    exit("QueryError:".error[2]);
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


//sessionチェック関数
function ssdiChk(){
    if(!isset($_SESSION["chk_ssid"]) ||
      $_SESSION["chk_ssid"]!=session_id()){
        echo "Login Error.";
        exit;
    }
}
?>