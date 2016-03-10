<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();

$result = profile_detail($_SESSION['userID']);//ユーザーの全ての情報を参照

	overwrite_session('name', $result[0]['name']);//セッションの値の有無に問わず上書きする
	overwrite_session('password', $result[0]['password']);
	overwrite_session('mail', $result[0]['mail']);
	overwrite_session('address', $result[0]['address']);
	overwrite_session('total', $result[0]['total']);
	overwrite_session('newDate', $result[0]['newDate']);

?>
<html>
	<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - ユーザー情報確認ページ</title>
	</head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - ユーザー情報確認ページ </a></h1>

<b>ユーザー登録情報</b>
<br>
<br>
ユーザー名: <?php echo $result[0]['name']; ?><br>
メールアドレス: <?php echo $result[0]['mail']; ?><br>
住所: <?php echo $result[0]['address']; ?><br>
<br>
<?php
echo '今までの購入金額は'."<br/>";	//連想配列で返ってくる購入金額データをすべて取得する
$result2 = serch_buy_total($_SESSION['userID']);
$total=0;
foreach ($result2 as $key => $val){
	foreach($val as $val){
		echo $val."円<br/>";
		$total += $val;
	}
}
echo "<br/>合計".$total."円です";
?>
<br>
<br>
	<form action="<?php echo UPDATE ?>" method="POST">
	<input type="submit" name="btnSubmit" value="ユーザー情報を変更する">
	</form>
	<form action="<?php echo DELETE ?>" method="POST">
	<input type="submit" name="btnSubmit" value="ユーザー情報を削除する">
	</form>
</body>
</html>