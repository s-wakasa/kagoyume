<?php
//商品購入確認ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

session_start();

if(!isset($_POST['mode']) or !$_POST['mode']=="BUYC"){//アクセスルートチェック
	echo return_top();
	die( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
$key_num='';
$total = 0;


$code = cookie_val_chk('code');
$name = cookie_val_chk('name');
$price = cookie_val_chk('price');
$image = cookie_val_chk('image');
$access_count = cookie_val_chk('access_count');
//cookieの値チェック

?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - 商品購入確認ページ</title>
	</head>
<body>
	<div align="right"><?php echo login_chk(BUY);?></div>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 商品購入確認ページ </a></h1>
	
	<form action="<?php echo SEARCH ?>" class="Search" method="GET"></form>
<?php 
for ($i=0; $i<$access_count; $i++){
	
	if(isset($name[$i]) && $key_num != $i){ ?>
		<b><?php echo $name[$i]; ?></b>
		<p><?php echo $price[$i].'円'?></p>
		<!-- クッキーを保存した順に表示 --><?php
		$total += $price[$i];
	}
} ?>
	<form action="<?php echo BUY_COMP ?>" method="POST">
	発送方法:<br>
	<br>
&nbsp;&nbsp;通常配送<input type="radio" name="type" value="1" <?php echo "checked";?>><br>
    <br>
&nbsp;&nbsp;お急ぎ便<input type="radio" name="type" value="2" ><br>
	

	<b><font color="#ff0000">合計 <?php echo $total; ?>円</font></b><br>
	<br>
	<input type="submit" name="btnSubmit" value="この金額で購入する">
	<input type="hidden" name="total" value="<?php echo $total;?>">
	<input type="hidden" name="userID" value="<?php if(isset($_SESSION['userID'])){ echo $_SESSION['userID']; } ?>">
	<input type="hidden" name="mode" value="BUY">
	</form>
	<form action="<?php echo CART ?>" ><input type="submit" name="btnSubmit" value="カートへ戻る"></form>

<?php
echo "<br/><br/>".return_top();
?>
	</body>
</html>