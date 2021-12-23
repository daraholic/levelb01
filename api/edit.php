<?php
include_once "../base.php";
dd($_POST);
// 陣列是否存在&有沒有在這個陣列裡
foreach($_POST['id'] as $key=>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        // 有就刪除
        $DB->del($id);
    }else{
        // 給他們id才能順利在資料庫找到人
        $data=$DB->find($id);

        // 處理一下例外
        switch($DB->table){
            case "title":
                $data['text']=$_POST['text'][$key];
                $data['sh']=($_POST['sh']==$id)?1:0;
                break;
            case "admin":
                break;
            case "menu":
                break;
            default:
                $data['text']=isset($_POST['text'])?$_POST['text'][$key]:'';
                $data['sh']=(isset($_POST['sh'])) && in_array($id,$_POST['sh'])?1:0;
            break;
            
        }

        // 沒有就是要更新
        $data['text']=$_POST['text'][$key];
        // if($_POST['sh']==$id){
        //     $data['sh']=1;
        // }else{
        //     $data['sh']=0;
        // }
        // 三元運算式簡化寫法:
        $data['sh']=($_POST['sh']==$id)?1:0;
        // 做完以上的事請存起來
        $DB->save($data);

    }
}
to("../back.php?do=".$DB->table);

?>
