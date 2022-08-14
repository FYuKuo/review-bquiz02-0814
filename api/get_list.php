<?php
include('./base.php');
$res = $News->all(['sh'=>1,'type'=>$_GET['type']]);

echo json_encode($res);
?>