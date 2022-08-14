<?php
include('./base.php');
$res = $News->find(['id'=>$_GET['id']]);

echo json_encode($res);
?>