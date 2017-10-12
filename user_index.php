<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>サインイン画面</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

    </style>
</head>

<body>
    <!--ヘッドここから-->
    <header>
        <nav><a href="top.php">トップ</a></nav>
    </header>

    <form method="post" action="user_insert.php">
        <div>
            <fieldset>
                <legend>サインイン</legend>
                <label>名前:<input type="text" name="name"></label><br>
                <label>email:<input type="text" name="email"></label><br>
                <label>Login ID: <input type="text" name="lid"></label><br>
                <label>Password:<input type="password" name="lpw"></label><br>
                <input type="submit" value="サインイン">
            </fieldset>
        </div>
    </form>


</body>

</html>
