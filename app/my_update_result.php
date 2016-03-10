<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - 更新情報確認ページ</title>
	</head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 更新情報確認ページ </a></h1>
<?php
//session_chk();
session_start();

//入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
if(!isset($_POST['mode']) or !$_POST['mode']=="UPDATE"){//アクセスルートチェック
	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
	if(isset($_POST['name']) && isset($_POST['mail']) && ($_POST['pass']) && ($_POST['address'])){
		update_usertable($_POST['name'],$_POST['pass'],$_POST['mail'],$_POST['address'],$_SESSION['userID']);
		
			echo 'ユーザー名:'.$_POST['name']."<br/>";
			echo 'パスワード:'.$_POST['pass']."<br/>";
			echo 'メールアドレス:'.$_POST['mail']."<br/>";
			echo '住所:'.$_POST['address']."<br/>";
		
			echo "<br/><br/>上記の内容で登録しました<br/><br/>";				
		
	}else{

		echo "空のフォームによる更新は出来ません";
        ?>
        <form action="<?php echo UPDATE ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        <?php
    }
}
echo return_top();
    ?>
</body>
</html>