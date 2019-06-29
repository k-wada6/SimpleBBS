<?php include('./action/bbsaction.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>BBS</title>
<link rel="stylesheet" href="../css/keijiban.css">
</head>
<body>
<h1>簡易掲示板</h1>
<?php if( !empty($success_message) ): ?>
    <p class="success_message"><?php echo $success_message; ?></p> 
<?php endif; ?>
<?php if( !empty($error_message) ): ?>
    <ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
            <li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>
<form method="post">
	<div>
		<label for="vname">名前</label>
		<input id="vname" type="text" name="vname" value="">
	</div>
	<div>
		<label for="message">メッセージ</label>
		<textarea id="message" name="message"></textarea>
	</div>

	<input type="submit" name="btn_submit" value="書き込む">
</form>
<hr>
<section>
<?php if( !empty($message_array) ){ ?>
<?php foreach( $message_array as $value ){ ?>
<article>
    <div class="info">
        <h2><?php echo $value['vname']; ?></h2>
        <time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
    </div>
    <p><?php echo $value['message']; ?></p>
</article>
<?php } ?>
<?php } ?>
</section>
</body>
</html>