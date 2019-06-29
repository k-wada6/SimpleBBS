<?php include('./action/confirmaction.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせ　管理ページ</title>
<link rel="stylesheet" href="../css/admin.css">
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

    <section>
<?php if( !empty($_SESSION['admin_login']) && $_SESSION['admin_login'] === true ): ?>

<br><a href="admin.php">掲示板 一覧</a></li>
<?php if( !empty($message_array) ){ ?>
<?php foreach( $message_array as $value ){ ?>

  <article>
	<div class="info">
		氏名：<h2><?php echo $value['your_name']; ?></h2>
		<time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
		<p><a href="confirmdelete.php?message_id=<?php echo $value['id']; ?>">削除</a></p>
	</div>
         <td><p>メールアドレス：<?php echo $value['email']; ?></p></td>
         <td><p>性別：　<?php echo $value['gender']; ?></p></td>
         <td><p>年齢：　<?php echo $value['age']; ?></p></td>
         <td><p>内容：　<?php echo $value['contact']; ?></p></td>
   </article>
<?php } ?>
<?php } ?>
<form method="get" action="">
    <input type="submit" name="btn_logout" value="ログアウト">
</form>
<?php else: ?>

<form method="post">
	<div>
		<label for="admin_password">ログインパスワード</label>
		<input id="admin_password" type="password" name="admin_password" value="">
	</div>
	    <input type="submit" name="btn_submit" value="ログイン">
</form>
<br><a href="../index.php">TOP画面へ</a></li>
<?php endif; ?>
</section>
</body>
</html>