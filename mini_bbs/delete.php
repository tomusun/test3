<?php
session_start();
require('dbconnect.php');

// 改めてログインしているユーザーのメッセージを消そうとしているのかどうか判断
if (isset($_SESSION['id'])){
    $id = $_REQUEST['id'];

    $messages = $db->prepare('SELECT * FROM posts WHERE id =?');
    $messages->execute(array($id));
    $message = $messages->fetch();
    // 一緒である場合、削除ができる
    if($message['member_id'] == $_SESSION['id']){
        $del = $db->prepare('DELETE FROM posts WHERE id=?');
        $del->execute(array($id));
    }
}
header('Location: index.php');
exit();
?>