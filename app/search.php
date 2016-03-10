<?php
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

$hits = array(); //検索結果を格納
$query = !empty($_GET["query"]) ? $_GET["query"] : ""; //(a)?b:cでaの真偽に応じてbあるいはcを行う
$sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score";
$category_id = ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;
//受け取ったGETの存在に応じて、APIへ送るパラメータを変数へ格納

if ($query != "") {
	$query4url = rawurlencode($query);
	$sort4url = rawurlencode($sort);
	$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
	$xml = simplexml_load_file($url);
	if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納
		$hits = $xml->Result->Hit;
	}
}
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>かごいっぱいのゆめ - 検索結果</title>
    </head>
<body>
<h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 検索結果 </a></h1>
<form action="<?php echo SEARCH ?>" class="Search" method="GET">
表示順序:
<select name="sort">
<?php foreach ($sortOrder as $key => $value) { ?>
        <option value="<?php echo h($key); ?>"><?php echo h($value);?></option>
        <?php } ?>						
        </select>
        キーワード検索：
        <select name="category_id">
        <?php foreach ($categories as $id => $name) { ?>
        <option value="<?php echo h($id); ?>" ><?php echo h($name);?></option>
        <?php } ?>
        </select>
        <input type="text" name="query" "/>
        <input type="submit" value="Yahooショッピングで検索"/>
        </form><!-- 入力フォーム -->
<?php         
foreach ($hits as $hit) { ?>
        <div class="Item">
            <?php $item_code = h($hit->Code);?><?php echo $item_code;?>
            <h2><a href="<?php echo ITEM.'?code='.$item_code ?>"><?php echo h($hit->Name); ?></a></h2>
            <p><a href="<?php echo ITEM.'?code='.$item_code ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a><font size="6" color="#ff0000"><?php echo h($hit->Price); ?>円</font></p>
          
        </div><!-- 商品IDを詳細ページへ送信 -->
        <?php } 
echo "<br>".return_top(); ?>
        </body>
</html>