<?php
// DB接続情報
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'phpdb');
// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
// 変数初期化
$message_data = array();
$error_message = array();
$res = null;
$mysqli = null;
$sql = null;
$message_id = null;

session_start();
if( empty($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true ) {
    // ログインページへリダイレクト
	header("Location: ./admin.php");
}
if( !empty($_GET['message_id']) && empty($_POST['message_id']) ) {
	$message_id = (int)htmlspecialchars($_GET['message_id'], ENT_QUOTES);
	// DB接続
	$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	// 接続Error確認
	if( $mysqli->connect_errno ) {
		$error_message[] = 'データベースの接続に失敗しました。 エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
	} else {
	
		// データの読み込み
		$sql = "SELECT * FROM keijiban WHERE id = $message_id";
		$res = $mysqli->query($sql);
		
		if( $res ) {
			$message_data = $res->fetch_assoc();
		} else {
		
			// データが読み込めなかったら一覧に戻る
			header("Location: ./admin.php");
		}
		
		$mysqli->close();
	}
} elseif( !empty($_POST['message_id']) ) {
	$message_id = (int)htmlspecialchars( $_POST['message_id'], ENT_QUOTES);
	// DB接続
	$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	// 接続Error確認
	if( $mysqli->connect_errno ) {
		$error_message[] = 'データベースの接続に失敗しました。 エラー番号 ' . $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
	} else {
		$sql = "DELETE FROM keijiban WHERE id = $message_id";
		$res = $mysqli->query($sql);
	}
	
	$mysqli->close();
	
	// 更新に成功したら一覧に戻る
	if( $res ) {
		header("Location: ./admin.php");
	}
}