<?php
//カートに追加完了ページ

if(!empty($_COOKIE['access_count'])){
	$count = $_COOKIE['access_count'];//2回目以降のアクセスはカウントに反映
}else{
	setcookie('access_count',"1");//notice回避の為に初期値は1
	$count = 0;
}

setcookie("code[$count]",$_POST['code']);
setcookie("name[$count]",$_POST['name']);
setcookie("price[$count]",$_POST['price']);
setcookie("image[$count]",$_POST['image']);

//if(!empty($_COOKIE["name"])){ $name = $_COOKIE["name"];}
//if(!empty($_COOKIE["price"])){ $price = $_COOKIE["price"];}
//if(!empty($_COOKIE["image"])){ $image = $_COOKIE["image"];}

$count++;
setcookie('access_count',$count);//アクセスカウント増加

//echo $_COOKIE['access_count'].'回アクセス'."<br/>";
//echo $name[0].$price[0].$image[0].'格納完了';

echo 'カートに追加しました'."<br/>";
echo return_top();