<?php
include('./base.php');

if(isset($_POST['id'])){

    foreach ($_POST['id'] as $key => $id) {
        
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){

            $News->del($id);

        }else{

            $data = $News->find($id);

            $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

            $News->save($data);
        }
    }

}

to('../back.php?do=news');
?>