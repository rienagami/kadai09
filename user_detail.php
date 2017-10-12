<?php
//1.GETでidを取得
$id = $_GET["id"];


//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //$row["name"]
}
?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>POSTデータ登録</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body>

        <!-- ここからヘッダースタート   -->
        <header>
            <nav>
                <div>
                    <a href="user_select.php">ユーザー一覧</a>
                </div>
            </nav>
        </header>
        <!--   ここからメイン-->

        <form method="post" action="user_update.php">
            <fieldset>
                <legend>ユーザー更新</legend>
                <label>名前:<input type="text" name="name" value="<?=$row["name"]?>"></label><br>

                <label>email:<input type="text" name="email" value="<?=$row["email"]?>"></label><br>

                <label>lid:<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
                
                <label>lpw:<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </form>




    </body>

    </html>
