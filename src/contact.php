<?php include('./action/contactaction.php'); ?>

<!DOCTYPE>
<html lang="ja">
<head>
<title>お問い合わせ</title>
<link rel="stylesheet" href="../css/contact.css">
</head>
<body>
<h1>お問い合わせ</h1>   
    <?php if( $page_flag === 1 ): ?>
    <form method="post" action="">
	  <div class="element_wrap">
		  <label>氏名</label>
		   <p><?php echo $_POST['your_name']; ?></p>         
      </div>
	<div class="element_wrap">
		  <label>メールアドレス</label>
		  <p><?php echo $_POST['email']; ?></p>
	</div>
  <div class="element_wrap">
		<label>性別</label>
		<p><?php if( $_POST['gender']  ){ echo '男性'; }
		else{ echo '女性'; } ?></p>
	</div>
	<div class="element_wrap">
		<label>年齢</label>
		<p><?php if( $_POST['age'] === "〜19歳" ){ echo '〜19歳'; }
		elseif( $_POST['age'] === "20歳〜29歳" ){ echo '20歳〜29歳'; }
		elseif( $_POST['age'] === "30歳〜39歳" ){ echo '30歳〜39歳'; }
		elseif( $_POST['age'] === "40歳〜49歳" ){ echo '40歳〜49歳'; }
		elseif( $_POST['age'] === "50歳〜59歳" ){ echo '50歳〜59歳'; }
		elseif( $_POST['age'] === "60歳〜" ){ echo '60歳〜'; } ?></p>
	</div>
	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<p><?php echo nl2br($_POST['contact']); ?></p>
	</div>
	<div class="element_wrap">
		<label>プライバシーポリシーに同意する</label>
		<p><?php if( $_POST['agreement'] === "1" ){ echo '同意する'; }
		else{ echo '同意しない'; } ?></p>
	</div>
    <input type="submit" name="btn_back" value="戻る">
	<input type="submit" name="btn_submit" value="送信">
	<input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
    <input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">
	<input type="hidden" name="age" value="<?php echo $_POST['age']; ?>">
	<input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
	<input type="hidden" name="agreement" value="<?php echo $_POST['agreement']; ?>">
</form>
    
    <?php elseif( $page_flag === 2 ): ?>
    <P>送信が完了致しました。</P>
    <a href="../index.php">TOP画面へ</a>
    
    <?php else: ?>
    <!- - 入力Error - ->
  <?php if( !empty($error) ): ?>       
	 <ul class="error_list">
	 <?php foreach( $error as $value ): ?>
		 <li><?php echo $value; ?></li>
	 <?php endforeach; ?>
	 </ul>
   <?php endif; ?>
    
    
     <form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<input type="text" name="your_name" value="<?php if( !empty($_POST['your_name']) ){ echo $_POST['your_name']; } ?>">
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<input type="text" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>">
	</div>
	<div class="element_wrap">
		<label>性別</label>
		<label for="gender_male"><input id="gender_male" type="radio" name="gender" value="男性">男性</label>
		<label for="gender_female"><input id="gender_female" type="radio" name="gender" value="女性">女性</label>
	</div>
	<div class="element_wrap">
		<label>年齢</label>
		<select name="age">
			<option value="">選択してください</option>
			<option value="〜19歳">〜19歳</option>　　　　
			<option value="20歳〜29歳">20歳〜29歳</option>
			<option value="30歳〜39歳">30歳〜39歳</option>
			<option value="40歳〜49歳">40歳〜49歳</option>
			<option value="50歳〜59歳">50歳〜59歳</option>
			<option value="60歳〜">60歳〜</option>
		</select>
	</div>
	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<textarea name="contact"></textarea>
	</div>
	<div class="element_wrap">
		<label for="agreement"><input id="agreement" type="checkbox" name="agreement" value="1">プライバシーポリシーに同意する</label>
	</div>    
	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>
     <a href="../index.php"> 戻る</a>
    
<?php endif; ?>
    
</body>
</html>