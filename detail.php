<?php
session_start();

include("functions.php");
ssidChk();

//GETでidを取得
$id = $_GET["id"];

//DB接続
$pdo = db_con();

//SELECT*FROM ges_an_table WHERE id=***;を取得
//(bindValue)を使用！
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    $row = $stmt->fetch();
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
                    <a href="select.php">データ一覧</a>
                </div>
            </nav>
        </header>
        <!--   ここからメイン-->

        <form method="post" action="update.php">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前:<input type="text" name="name" value="<?=$row["name"]?>"></label><br>

                <label>email:<input type="text" name="email" value="<?=$row["email"]?>"></label><br>

                <label><textarea name="naiyou" rows="4" cols="40" ><?=$row["naiyou"]?></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </form>




    </body>

    </html>
