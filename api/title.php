<?php

include "../base.php";
// 判斷上傳是否有成功
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

$data['text']=$_POST['text'];
$data['sh']=0;
$Title->save($data);
to("../back.php?do=".$Title->table)

?>