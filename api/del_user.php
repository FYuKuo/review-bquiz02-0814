<?php
include('./base.php');

if(!empty($_POST['del'])){

    foreach ($_POST['del'] as $key => $id) {
        $Admin->del($id);
    }
}
?>