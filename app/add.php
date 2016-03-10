<?php
//カートに追加完了ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

if(!isset($_POST['mode']) or !$_POST['mode']=="ADD"){//アクセスルートチェック
	echo return_top();
	die( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
if(!empty($_COOKIE['access_count'])){
	$count = $_COOKIE['access_count'];//2回目以降のアクセスはカウントに反映
}else{
	setcookie('access_count',"1");//notice回避の為に初期値は1
	$count = 0;
}

setcookie("code[$count]",$_POST['code']);//配列の要領で各要素をクッキーへ格納
setcookie("name[$count]",$_POST['name']);
setcookie("price[$count]",$_POST['price']);
setcookie("image[$count]",$_POST['image']);

$count++;
setcookie('access_count',$count);//アクセスカウント増加

?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<title>かごいっぱいのゆめ - カートに追加 </title>
	</head>
<body>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - カートに追加 </a></h1>
	<form action="<?php echo SEARCH ?>" class="Search" method="GET">
	<a href="<?php echo CART ?>">カートの中を見る</a>
<?php
echo 'カートに追加しました'."<br/>";
echo return_top();
?>
	</form>
</body>
</html>