<!DOCTYPE html>
<html lang="ja" manifest="no.appcache">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
    <title>PHPbbs</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="js/common.js"></script>
    <script src="js/realtimeclock.js"></script>
    
    </head>
<body>
<script language="JavaScript">
<!--
resizeTo(1024,768)
//-->
</script>
	<!--  loading anim -->
	<div id="loadingAnim" class="loadingAnim"><i class="loadingAnim_line"></i></div>
	<!--  loading anim -->

	<header class="index">
		<h1 class="index_bbs">Portfolio</h1>
		<span class="index_description">Simple BBS</span>
	<p id="realtimeclock">※時計</p>
    </header>

<div class="main">
           
    <div class="left">
       <iframe src="./src/bbs.php" ></iframe>
    </div>  
    <div class="right">
        <ul>
            <li><a href="./src/contact.php">お問い合わせ</a></li>
            <li><a href="./src/admin.php">管理画面</a></li>
        </ul>
            <div class="box">
                 <div class="box-title">PCスペックor開発環境</div>
                 <h2>--PCスペック--</h2>
                 <p>OS: Windows10</p>
                 <p>CPU: Core i7 7700K</p>
                 <p>GPU: GTX1080</p>
                 <p>メモリ: 16GB</p>
                 <p>HDD: 2TB</p>
                 <p>SSD: 500GB</p>
                 <h2>--環境--</h2>
                 <p>PHP7.1</p>
                 <p>Apache/2.4.39</p>
                 <p>MariaDB/10.1.40</p>
                 <p>JavaScript</p>
                 <p>jquery</p>
                 <p>html/css</p>
                 <p>ソースコードエディタ:Visual Studio Code</p>
            </div>        
    </div>
</div>    
	
    <footer>
    </footer>
</body>
</html>