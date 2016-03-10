<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();
?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - 登録完了ページ</title>
	</head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 登録完了ページ </a></h1>
<?php

if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){//アクセスルートチェック
	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{

	$result = insert_user_record($_SESSION['name'],$_SESSION['pass'],$_SESSION['mail'],$_SESSION['address']);
	if(!isset($result)){
		
		echo 'ユーザー名:'.$_SESSION['name']."<br/>";
		echo 'パスワード:'.mb_strlen($_SESSION['pass'])."文字のパスワード<br/>";
		echo 'メールアドレス:'.$_SESSION['mail']."<br/>";
		echo '住所:'.$_SESSION['address']."<br/>";
		
		echo "<br/><br/>上記の内容で登録しました<br/><br/>";

	}else{
		echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
	}
}

echo return_top();
?>

</body>
</html>