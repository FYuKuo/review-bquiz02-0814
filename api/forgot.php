<?php
include('./base.php');
$user = $Admin->find(['email'=>$_GET['email']]);

if(!empty($user)){

    echo "您的密碼為:".$user['pw'];

}else{
    echo "查無此資料";
}

?>