<?php
// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
// 変数初期化

$data = null;
$now_date = null;

//分岐
$page_flag = 0;
$clean = array();
$error = array();

if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}
if( !empty($_POST['btn_confirm']) ) {
	$error = validation($clean);

	if( empty($error) ) {
		$page_flag = 1;	
    }
    
} elseif( !empty($_POST['btn_submit']) ) {
	
	// 日時取得
	$now_date = date("Y-m-d H:i:s");
	
	$page_flag = 2;
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=phpdb;host=localhost;","root","");

    $pdo->exec("insert into contactform(your_name,email,gender,age,contact,post_date)    values('".$_POST['your_name']."','".$_POST['email']."','".$_POST['gender']."','".$_POST['age']."','".$_POST['contact']."', '$now_date');");

}
function validation($data) {
	
	$error = array();
	// 未入力Error
	if( empty($data['your_name']) ) {
		$error[] = "「氏名」を入力してください。";
	}
    
	if( empty($data['email']) ) {
		$error[] = "「メールアドレス」を入力してください。";
	}
	if( empty($data['gender']) ) {
		$error[] = "「性別」を選択してください。";
	}
	if( empty($data['age']) ) {
		$error[] = "「年齢」を選択してください。";
	}
	if( empty($data['contact']) ) {
		$error[] = "「お問い合わせ内容」を入力してください。";
	}	
	if( empty($data['agreement']) ) {
		$error[] = "プライバシーポリシーをご確認ください。";
	}
	return $error;
}