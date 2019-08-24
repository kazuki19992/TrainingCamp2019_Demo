<!-- ログイン時設定ファイル -->
<?php

define('DSN', 'mysql:dbname=sample;host=localhost;charset=utf8');   // DSNという変数に値を設定する
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('SITE_URL', 'http://localhost/demo/');

error_reporting(E_ALL & ~E_NOTICE);     // E_NOTICE以外のエラーをすべて出力
session_set_cookie_params(1440, '/');   // セッションの設定を行う

