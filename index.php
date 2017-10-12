<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>第9回課題</title>
  <!--   【懺悔！！すみません！まだ課題完成してません！！！エラーの嵐に襲われています・・・・】-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">アンケートを登録する</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend></legend>
     <label>フリーアンケート：<input type="text" name="name"></label><br>
     <label>：<input type="text" name="email"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
