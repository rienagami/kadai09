<?php

try {
    $pdo = new
    PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//2データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
    
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .='<p>';
        $view .='<a href="user_detail.php?
        id='.$result["id"].'">';
        
        $view .= ($result["name"])."[".$result["indate"]."]<br>";
        $view .= '</a> ';
        
        
//delete処理の時書いた
       $view .='<a href="user_delete.php?
       id='.$result["id"].'">';
        $view .= '[DELETE]';
        $view .= '</a>';
        
        $view .= '</p>';

    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧画面</title>
    <link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
   <header>  
<!--ここからヘッド-->
   <nav>
       
    <div>ユーザー一覧</div>   
      
      
      <a class="navbar-brand" href="top.php">トップ</a>
       
       
       
   </nav>
    
  </header>  
   
   <div>
      <div class="container jumpotron"><?=$view?></div> 
       
       
   </div>
    
    
    
    
    
</body>
</html>




