<?php
include_once "../base.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}else{
    if($DB->table!='admin'&& $DB->talbe!="menu"){
        $data['img']='';

    }
}

// 針對不同表作改變
switch($DB->table){
    case "title":
        $data['text']=$_POST['text'];
        $data['sh']=0;
    break;
    case "admin":
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case "menu":
        $data['name']=$_POST['name'];
        $data['href']=$_POST['href'];
        $data['sh']=1;
        $data['parent']=0;
    break;
    default:
        $data['text']=$_POST['text']??'';
        $data['sh']=0;
        break;
}


$DB->save($data);
to("../back.php?do=".$DB->table)

?>
