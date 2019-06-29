<?php
define( 'PASSWORD', 'admin234');
// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
// 変数初期化
$message_array = array();
$message = array();
$error_message = array();
$clean = array();
$success_message = null;
$file_handle = null;
$split_data = null;
$data = null;
$now_date = null;

session_start();

if( !empty($_GET['btn_logout']) ) {
	unset($_SESSION['admin_login']);
}

ini_set('display_errors', 0);

if( !empty($_POST['btn_submit']) ) {
	
	if( !empty($_POST['admin_password']) && $_POST['admin_password'] === PASSWORD ) {
		$_SESSION['admin_login'] = true;
	} else {
		$error_message[] = 'ログインに失敗しました。';
	}
}
// 管理ページのログインパスワード
define( 'PASSWORD', 'adminPassword');

// DB接続
$mysqli = new mysqli( 'localhost', 'root', '', 'phpdb');

// 接続Error確認
if( $mysqli->connect_errno ) {
	$error_message[] = 'データの読み込みに失敗しました。 エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
} else {
	$sql = "SELECT id,vname,message,post_date FROM keijiban ORDER BY post_date DESC";
	$res = $mysqli->query($sql);
	
	if( $res ) {
		$message_array = $res->fetch_all(MYSQLI_ASSOC);
	}
	
	$mysqli->close();
}
?>