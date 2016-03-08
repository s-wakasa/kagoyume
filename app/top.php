<?php

require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");

?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>かごいっぱいのゆめ - トップページ </title>
    </head>
    <body>
        <h1><a href="<?php echo ROOT_URL.TOP_URI ?>">かごいっぱいのゆめ - 仮想商品購入サイト </a></h1>
        <form action="<?php echo SEARCH ?>" class="Search" method="GET">
        表示順序:
        <select name="sort">
        <?php foreach ($sortOrder as $key => $value) { ?>
        <option value="<?php echo h($key); ?>" <?php /*if($sort == $key) echo "selected=\"selected\"";*/ ?>><?php echo h($value);?></option>
		<?php } ?>										<!-- 謎の初期値 -->>
		</select>
        キーワード検索：
        <select name="category_id">
        <?php foreach ($categories as $id => $name) { ?>
        <option value="<?php echo h($id); ?>" <?php /* if($category_id == $id) echo "selected=\"selected\""; */ ?>><?php echo h($name);?></option>
        <?php } ?>
        </select>
        <input type="text" name="query"  value="<?php /* echo h($query); */ ?>"/>
        <input type="submit" value="Yahooショッピングで検索"/>
        </form><!--入力フォーム-->
        
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
    </body>
</html>