<?php include('./action/confirmdeleteaction.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせ 管理ページ</title>
<link rel="stylesheet" href="../css/admin.css">
<style>

</style>
</head>
<body>
<h1>お問い合わせ 管理ページ</h1>
<?php if( !empty($error_message) ): ?>
    <ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
            <li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>
<p class="text-confirm">以下のお問い合わせを削除します。<br>よろしければ「削除」ボタンを押してください。</p>
<br><form method="post">
    <div>
        <label for="your_name">氏名</label>
        <input id="your_name" type="text" name="your_name" value="<?php if( !empty($message_data['your_name']) ){ echo $message_data['your_name']; } ?>" disabled>
    </div>
    
    <div>
    <label for="gender">性別</label>
        <input id="gender" type="text" name="gender" value="<?php if( !empty($message_data['gender']) ){ echo $message_data['gender']; } ?>" disabled>
    </div>
    <div>
    <label for="age">年齢</label>
        <input id="age" type="text" name="age" value="<?php if( !empty($message_data['age']) ){ echo $message_data['age']; } ?>" disabled>
    </div>
    
    <label for="email">メールアドレス</label>
        <input id="email" type="text" name="email" value="<?php if( !empty($message_data['email']) ){ echo $message_data['email']; } ?>" disabled>
    </div>

    <div>
        <label for="contact">内容</label>
        <textarea id="contact" name="contact" disabled><?php if( !empty($message_data['contact']) ){ echo $message_data['contact']; } ?></textarea>
    </div>
    
    <a class="btn_cancel" href="confirm.php">キャンセル</a>
    <input type="submit" name="btn_submit" value="削除">
    <input type="hidden" name="message_id" value="<?php echo $message_data['id']; ?>">
</form>
</body>
</html>


