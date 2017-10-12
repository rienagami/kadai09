<?php
//必ず最初に宣言
session_start();

//現在のセッションIDを取得
$old_sessionid = session_id();

//新しいセッションIDを発行（古いものは無効）
session_regenerate_id();

//新しいセッションIDを取得
$new_sessionid = session_id();

//旧セッションIDと新セッションIDを表示
echo "古いセッション: $old_sessionid<br />";
echo "新しいセッション: $new_sessionid<br />";

?>