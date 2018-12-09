<?php
session_start();

// 空っぽの配列で上書きする。
$_SESSION = array();
// 「session.use_cookies」はセッションにクッキーを使用するかどうかの設定ファイル
if(ini_set('session.use_cookies')){
    $params = session_get_cookie_params();
    // クッキーの有効期限を切ることでセッションを削除
    setcookie(session_name() . '', time() - 4200,
    $params['path'],$params['domain'],$params['secure'],$params['httponly']);
}
session_destroy();

// クッキーに保存されているメールアドレスも削除。空の値を設定して有効期限を切る。これによってクッキーも切れる
setcookie('email', '' , time()-3600);

header('Location: login.php'); 
exit();
?>
