<?php
define( 'DB_HOST', 'localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');
define( 'DB_NAME', 'phpdb');
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

if( !empty($_POST['btn_submit']) ) {
	
	// 表示名入力チェック
	if( empty($_POST['vname']) ) {
		$error_message[] = '表示名を入力してください。';
	} else {
		$clean['vname'] = htmlspecialchars( $_POST['vname'], ENT_QUOTES);
		
		// セッションに表示名を保存
		$_SESSION['vname'] = $clean['vname'];
	}
	
	// メッセージ入力チェック
	if( empty($_POST['message']) ) {
		$error_message[] = 'ひと言メッセージを入力してください。';
	} else {
		$clean['message'] = htmlspecialchars( $_POST['message'], ENT_QUOTES);
		$clean['message'] = preg_replace( '/\\r\\n|\\n|\\r/', '<br>', $clean['message']);
	}
	if( empty($error_message) ) {
		
	// DB接続
	$mysqli = new mysqli( 'localhost', 'root', '', 'phpdb');
	// 接続Error確認
	if( $mysqli->connect_errno ) {
		$error_message[] = '書き込みに失敗しました。 エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
	} else {
			// 文字コード
			$mysqli->set_charset('utf8');
			
			
			// 日時を取得
			$now_date = date("Y-m-d H:i:s");
			
			// データ登録SQL作成
			$sql = "INSERT INTO keijiban (vname, message, post_date) VALUES ( '$clean[vname]', '$clean[message]', '$now_date')";
			
			// データ登録
			$res = $mysqli->query($sql);
		
			if( $res ) {
				$success_message = 'メッセージを書き込みました。';
			} else {
				$error_message[] = '書き込みに失敗しました。';
			}
        
			$mysqli->close();
	}
	}
}
// DB接続
$mysqli = new mysqli( 'localhost', 'root', '', 'phpdb');

// 接続エラー確認
if( $mysqli->connect_errno ) {
	$error_message[] = 'データの読み込みに失敗しました。 エラー番号 '.$mysqli->connect_errno.' : '.$mysqli->connect_error;
} else {
	$sql = "SELECT vname,message,post_date FROM keijiban ORDER BY post_date DESC";
	$res = $mysqli->query($sql);
	
	if( $res ) {
		$message_array = $res->fetch_all(MYSQLI_ASSOC);
	}
	
	$mysqli->close();
}
?>