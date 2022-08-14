<?php
include('./base.php');
$Que->save(['name'=>$_POST['name'],'parent_id'=>0,'sum'=>0]);

$parent_id = $Que->find(['name'=>$_POST['name']])['id'];

if(isset($_POST['opts'])){

    foreach ($_POST['opts'] as $key => $opt) {
        
        if(!empty($opt)){
            $Que->save(['name'=>$opt,'parent_id'=>$parent_id,'sum'=>0]);
        }

    }

}

?>