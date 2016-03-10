<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();

delete_buytable($_SESSION['userID']);

delete_profile($_SESSION['userID']);
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - ユーザー情報削除完了ページ</title>
	</head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - ユーザー情報削除完了ページ </a></h1>

削除が完了しました<br><br>

<?php echo return_top(); ?>