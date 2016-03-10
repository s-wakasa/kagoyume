<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

if(!isset($_POST['mode']) or !$_POST['mode']=="MUPDATE"){//アクセスルートチェック
	echo return_top();
	die( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - ユーザー情報更新ページ</title>
	</head>
	<body>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - ユーザー情報更新ページ </a></h1>

    <form action="<?php echo UP_RESULT ?>" method="POST">
                
        ユーザー名:
        <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
        <br><br>
	メールアドレス:
        <input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>">
        <br><br>
        パスワード:
        <input type="text" name="pass" value="<?php echo $_SESSION['password'];?>">
        <br><br>

        住所:
        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>">
        <br><br>
  
        
        <input type="hidden" name="mode"  value="UPDATE">
        <input type="submit" name="btnSubmit" value="更新する">
    </form>
    
    <?php echo return_top(); ?>
</body>
</html>
