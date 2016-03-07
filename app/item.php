<?php
//商品詳細ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");



$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
$xml = simplexml_load_file($url);
if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納
	$hits = $xml->Result->Hit;
}