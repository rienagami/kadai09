<?php

session_start();

echo $_SESSION["name"]."様";
echo $_SESSION["age"]."歳";

$_SESSION['test'] = 'テスト';
echo $_SESSION['test']."<br>";
echo '<a href="session2_2.php">session2_2.php</a>';


?>