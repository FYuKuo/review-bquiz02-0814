<?php
include('./base.php');
$res = $Admin->math('COUNT','id',['acc'=>$_GET['acc']]);

echo $res;
?>