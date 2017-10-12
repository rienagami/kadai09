<?php


try {
    
$pdo = new
PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


//session_start();
//
//include("functions.php");
//ssidChk();
//
////DB接続する
//$pdo = db_con();

//データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    //SELECTデータの数だけ自動でセーブしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
    {
$view .= '<p>';
$view .= '<a href="detail.php?id='.$result["id"].'">';
$view .= ($result["name"])."[".$result["indate"]."]<br>";
$view .= '</a>　';
      
        
//delete処置の時に書いた
$view .='<a href="delete.php?id='.$result["id"].'">';
$view .= '[削除]';
$view .= '</a>';
$view .= '</p>';
}
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>表示</title>
</head>
<body id="main">
   
   <header>
       <nav>
           <div>
               <a href="index.php">データ登録</a>
           </div>
       </nav>
   </header>
<!--   headerここまで-->
<!--   ここからメイン-->
  
  <div>
      <div><?=$view?></div>
  </div>

<!--   メインここまで-->

    
</body>
</html>