<?php
//商品詳細ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

if(!empty($_GET['code'])){//配列チェックとエラー表示
	$item_code = $_GET['code'];
}else{
	echo "不正なURLです<br/>";
	die(return_top());
}

$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$item_code&image_size=300";
$xml = simplexml_load_file($url);
if ($xml["totalResultsReturned"] != 0) {
	$hits = $xml->Result->Hit;
}else{
	 echo "その商品ページは存在しません<br/>";
	 die(return_top());
}//APIが検索結果を返さなかった場合にエラー表示

$name = h($hits->Name);
$price = h($hits->Price);
$image = h($hits->Image->Small);

?>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>かごいっぱいのゆめ　- 商品詳細</title>
    </head>
	<body>
	   	<div align="right"><?php echo login_chk(ITEM);?></div>
	<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 商品詳細 </a></h1>

	<font size="6"><?php echo $name."<br/>"; ?></font>

	<font size="6" color="#ff0000">価格:<?php echo $price; ?>円</font><br>

	<p><img src="<?php echo h($hits->ExImage->Url); ?>" /><br></p>

	<p><?php echo h($hits->Headline); ?></p>

	<p><?php echo h($hits->Review->Rate); ?><br></p>
	
	<form action="<?php echo ADD ?>" method="POST">
	<input type="hidden" name="code"  value="<?php echo $item_code ?>">
	<input type="hidden" name="name"  value="<?php echo $name ?>">
	<input type="hidden" name="price"  value="<?php echo $price ?>">
	<input type="hidden" name="image"  value="<?php echo $image ?>">
	<input type="hidden" name="mode"  value="ADD">
	<input type="submit" name="btnSubmit" value="カートへ追加">
	
	</form>
	<?php echo "<br/>".return_top(); ?>
	</body>
</html>