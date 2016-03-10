<?php
session_start();
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - 新規会員登録ページ</title>
	</head>
	<body>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 商品購入確認ページ </a></h1>

    <form action="<?php echo REG_CONFIRM ?>" method="POST">
                
        ユーザー名:
        <input type="text" name="name" value="<?php echo form_value('name'); ?>">
        <br><br>
	メールアドレス:
        <input type="text" name="mail" value="<?php echo form_value('mail'); ?>">
        <br><br>
        パスワード:
        <input type="password" name="pass">
        <br><br>
        パスワード(確認のためもう一度入力してください):
        <input type="password" name="pass2">
        <br><br>
        住所:
        <input type="text" name="address" value="<?php echo form_value('address'); ?>">
        <br><br>
  
        
        <input type="hidden" name="mode"  value="CONFIRM">
        <input type="submit" name="btnSubmit" value="登録確認画面へ">
    </form>
    
    <?php echo return_top(); ?>
</body>
</html>