<?php include_once "../base.php";
// 把資料拿出來改好之後再丟回去資料庫
// 最後回到原本頁面
/* 
$views=$_POST['total'];
$total=$Total->find(1);
$total['total']=$views; */
$Bottom->save(['id'=>1,'bottom'=>$_POST['bottom']]);

to("../back.php?do=bottom");