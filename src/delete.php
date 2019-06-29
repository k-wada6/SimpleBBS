<?php include('./action/bbsdeleteaction.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>管理ページ（投稿の削除）</title>
<link rel="stylesheet" href="../css/admin.css">
<style>

</style>
</head>
<body>
<h1>管理ページ（投稿の削除）</h1>
<?php if( !empty($error_message) ): ?>
    <ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
            <li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>

<p class="text-confirm">以下の投稿を削除します。<br>よろしければ「削除」ボタンを押してください。</p>
  <form method="post">
    <div>
        <label for="vname">表示名</label>
        <input id="vname" type="text" name="vname" value="<?php if( !empty($message_data['vname']) ){ echo $message_data['vname']; } ?>" disabled>
    </div>
    <div>
        <label for="message">ひと言メッセージ</label>
        <textarea id="message" name="message" disabled><?php if( !empty($message_data['message']) ){ echo $message_data['message']; } ?></textarea>
    </div>
    <a class="btn_cancel" href="admin.php">キャンセル</a>
    <input type="submit" name="btn_submit" value="削除">
    <input type="hidden" name="message_id" value="<?php echo $message_data['id']; ?>">
  </form>
</body>
</html>