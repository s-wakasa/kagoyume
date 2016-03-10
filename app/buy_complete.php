<?php
//購入完了ページ
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");
session_start();

if(isset($_POST['type']) && isset($_POST['total']) && isset($_SESSION['userID'])){	

	$result = insert_buy_record($_SESSION['userID'], $_POST['total'], $_POST['type']);//購入情報テーブルへ追記
	$result2 = serch_users_total($_SESSION['userID']);//これまでの総購入金額を参照
	$result2[0]['total'] += $_POST['total'];
	update_profile($result2[0]['total'],$_SESSION['userID']);//今回の購入を含めたtotal値で上書き
}

if(!isset($result)){
	
	echo "購入完了しました<br/><br/>";
	for ($i=0; $i<$_COOKIE['access_count']; $i++){
		setcookie("code[$i]", '', time() - 1800);
		setcookie("name[$i]",'', time() - 1800);
		setcookie("price[$i]",'', time() - 1800);
		setcookie("image[$i]",'', time() - 1800);//カート内データの削除
	}
}else{
	echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
}
echo return_top();