<?php
//カート内確認ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$key_num='';

if(isset($_POST['delete'])){
	$key_num = $_POST['delete'];
	setcookie("code[$key_num]", '', time() - 1800);
	setcookie("name[$key_num]",'', time() - 1800);
	setcookie("price[$key_num]",'', time() - 1800);
	setcookie("image[$key_num]",'', time() - 1800);
}

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
		<title>かごいっぱいのゆめ - カートの中にある商品 </title>
	</head>
<body>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 仮想商品購入サイト </a></h1>
	<form action="<?php echo SEARCH ?>" class="Search" method="GET"></form>
<?php 
for ($i=0; $i<$access_count; $i++){
	
	if(isset($name[$i]) && $key_num != $i){ ?>
		<h2><a href="<?php echo ITEM.'?code='.$code[$i] ?>"><?php echo $name[$i]; ?></a></h2>
		<p><a href="<?php echo ITEM.'?code='.code[$i] ?>"><img src="<?php echo $image[$i]; ?>"></a></p>
		<p><?php echo $price[$i].'円'?></p>
		<form action="<?php echo CART ?>" method="POST">
		<input type="hidden" name="delete" value="<?php echo $i;?>">
		<input type="submit" value="この商品をカートから削除">
		</form>
		<!-- クッキーを保存した順に表示 --><?php

	}
}
echo return_top();
?>
</body>
</html>