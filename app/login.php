<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>かごいっぱいのゆめ - ログイン/ログアウト画面</title>
    </head>
<body>
	<?php
	if(isset($_POST['name']) && isset($_POST['pass'])){
		$flag = serch_all_profiles($_POST['name'],$_POST['pass']);
		if(isset($flag[0])){
			echo "ログインできた";
		}else{
			echo "ユーザー名またはパスワードが間違っています";
			die("<a href='".LOGIN."'>ログイン画面へ戻る</a>");	
		}
		
	}
	?>
    <form action="<?php echo LOGIN ?>" method="POST">            
        ユーザー名:
        <input type="text" name="name" >
        	<br><br>
	 パスワード:
        <input type="text" name="pass" >
        	<br><br>
        <input type="submit" name="btnSubmit" value="送信">
	</form>
    
    <?php echo "<br/>".return_top(); ?>
</body>
</html>