<?php
include('./base.php');
if($_POST['type'] == 1 ){
    $Log->save(['user'=>$_SESSION['user'],'news_id'=>$_POST['id']]);
}else{
    $Log->del(['user'=>$_SESSION['user'],'news_id'=>$_POST['id']]);
}

$News->save(['id'=>$_POST['id'],'good'=>$_POST['good']]);
?>