<?php
//ログインページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();
$flag = 0;

if (isset($_SESSION['userstate']) && $_SESSION['userstate']=='login'){
	logout_s();//セッション情報の削除
	cookie_reset();//カート内データの削除
	die ("ログアウトしました<br/><br/>".return_top());
}
	
if(isset($_POST['name']) && isset($_POST['pass'])){ //ログイン時に入力フォームの情報を受け取りDBのデータを参照
	$result = serch_all_profiles($_POST['name'],$_POST['pass']);

	if(isset($result[0])){//DBから受け取ったデータチェック
		if(empty($_SESSION['userID']) && empty($_SESSION['username'])){
			echo $result[0]['userID'];
			$_SESSION['userID'] = $result[0]['userID'];
			$_SESSION['username'] = $_POST['name'];//ユーザーIDとユーザー名をセッションに保持
		}
		$_SESSION['userstate']='login';
		$flag = 1;	//ページリフレッシュを管理するフラグ
	}else{
		echo "ユーザー名またはパスワードが間違っています";
		die("<a href='".LOGIN."'>ログイン画面へ戻る</a>");
	}		
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
<?php   if(isset($_SESSION['place']) && $flag == 1){ //フラグによって初回アクセス時の誤リフレッシュを防ぐ
			echo '<meta http-equiv=refresh content=0;URL='.$_SESSION['place'].'>';//送信ボタンを押した場合のみページジャンプが行われる		
		}?>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>かごいっぱいのゆめ - ログイン/ログアウト画面</title>
    </head>
<body>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - ログイン/ログアウト画面 </a></h1>
    <form action="<?php echo LOGIN ?>" method="POST">            
        ユーザー名:
        <input type="text" name="name" >
        	<br><br>
	 パスワード:
        <input type="text" name="pass" >
        	<br><br>
        <input type="submit" name="btnSubmit" value="送信">
        <input type="hidden" name="flag" value="true">
	</form>
    <?php
    echo "<br/>"."<a href='".REGIST."'>新規会員登録はこちら</a>";
    
    echo "<br/><br/>".return_top(); ?>
</body>
</html>