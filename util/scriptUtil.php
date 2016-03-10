<?php
//ユーザー定義関数管理ファイル

//既にセッションの値チェックが行われているかどうかに問わず上書きの処理を行う
function overwrite_session($key,$var){
	if(empty($_SESSION[$key])){
		$_SESSION[$key] = $var;
	}else{
		$_SESSION[$key] = $var;
	}	
}

//フォームに値が入力されていればセッションから同じ値を返す関数
function form_value($name){
	if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
	}
}

// ポストの値チェックをしてからセッションに格納する
//二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する

function bind_p2s($name){
	if(!empty($_POST[$name])){
		$_SESSION[$name] = $_POST[$name];
		return $_POST[$name];
	}else{
		$_SESSION[$name] = null;
		return null;
	}
}


//セッションのリセット処理
function logout_s(){
	session_unset();
	if (isset($_COOKIE['PHPSESSID'])) {
		setcookie('PHPSESSID', '', time() - 1800, '/');
	}
	session_destroy();
}

//ログイン画面とユーザー情報のリンクを表示する関数
function login_chk($key){
	if(isset($_SESSION['userstate']) && $_SESSION['userstate']=='login'){
		return 'ようこそ<a href='.MYDATA.'>'.$_SESSION['username'].'</a>さん'.'&nbsp;'.'<a href='.LOGIN.'>ログアウト画面へ進む</a>';
	}else{
		$_SESSION['place']= $key;
		return '<a href='.LOGIN.'>ログイン画面へ進む</a>';
	}
}

//TOPページへのリンクを表示する関数
function return_top(){
	return "<a href='".ROOT_URL.TOP_URI."'>トップへ戻る</a>";
}

//cookieの値チェックをして返す関数
function cookie_val_chk($key){
	if(!empty($_COOKIE["$key"])){ return $_COOKIE["$key"];}
}

/**
 * @brief アプリケーションID
 * Yahoo! JAPANが提供するWeb APIを利用するアプリケーションには、アプリケーションIDが必要です。
 * Yahoo!デベロッパーネットワークで取得したアプリケーションIDを設定してください。
 * @var string
 */
$appid = "dj0zaiZpPUlzYUoxQUUwTWZrNCZzPWNvbnN1bWVyc2VjcmV0Jng9OTc-";//取得したアプリケーションIDを設定

/**
 * @brief カテゴリーID一覧
 * 商品カテゴリの一覧です。
 * キーにカテゴリID、値にカテゴリ名が入っています。
 * @var array
 */
$categories = array(
		"1" => "すべてのカテゴリから",
		"13457"=> "ファッション",
		"2498"=> "食品",
		"2500"=> "ダイエット、健康",
		"2501"=> "コスメ、香水",
		"2502"=> "パソコン、周辺機器",
		"2504"=> "AV機器、カメラ",
		"2505"=> "家電",
		"2506"=> "家具、インテリア",
		"2507"=> "花、ガーデニング",
		"2508"=> "キッチン、生活雑貨、日用品",
		"2503"=> "DIY、工具、文具",
		"2509"=> "ペット用品、生き物",
		"2510"=> "楽器、趣味、学習",
		"2511"=> "ゲーム、おもちゃ",
		"2497"=> "ベビー、キッズ、マタニティ",
		"2512"=> "スポーツ",
		"2513"=> "レジャー、アウトドア",
		"2514"=> "自転車、車、バイク用品",
		"2516"=> "CD、音楽ソフト",
		"2517"=> "DVD、映像ソフト",
		"10002"=> "本、雑誌、コミック"
);
/**
 * @brief ソート方法一覧
 * 検索結果のソート方法の一覧です。
 * キーに検索用パラメータ、値にソート方法が入っています。
 * @access private
 * @var array
 */
$sortOrder = array(
		"-score" => "おすすめ順",
		"+price" => "商品価格が安い順",
		"-price" => "商品価格が高い順",
		"+name" => "ストア名昇順",
		"-name" => "ストア名降順",
		"-sold" => "売れ筋順"
);

/**
 * @brief 特殊文字を HTML エンティティに変換する
 * html上の特別な意味を持つ記号を変換する関数
 * @param string $str 変換したい文字列
 * @return string html用に変換した文字列
 */
function h($str)
{
	return htmlspecialchars($str, ENT_QUOTES);
}

?>