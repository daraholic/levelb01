<?php include_once "../base.php";

foreach($_POST['name'] as $key=>$name){
    if($name!=''){
        $Menu->save(['name'=>$name,
                    'href'=>$_POST['href'][$key],
                    'sh'=>1,
                    'parent'=>$_GET['main']])
    }
}




?>