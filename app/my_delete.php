<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

if(!isset($_POST['mode']) or !$_POST['mode']=="MDELETE"){//アクセスルートチェック
	echo return_top();
	die( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - 登録内容削除確認ページ</title>
	</head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 登録内容削除確認ページ </a></h1>
<?php
//session_chk();
session_start();
?>
        
        ユーザー名:<?php echo $_SESSION['name'];?><br>
        メールアドレス:<?php echo $_SESSION['mail'];?><br>
        住所:<?php echo $_SESSION['address'];?><br>
	総購入金額:<?php echo $_SESSION['total'];?><br>
	登録日時:<?php echo $_SESSION['newDate'];?><br>
	

         このユーザーを削除します。本当によろしいですか？<br><br>
	
	
	<form action="<?php echo DEL_RESULT ?>" method="POST">
    <input type="hidden" name="mode" value="DELETE" >
    <input type="submit" name="yes" value="はい">
    </form>
    <br>
   	<a href="<?php echo ROOT_URL.TOP_URI ?>">いいえ</a>

</body>
</html>