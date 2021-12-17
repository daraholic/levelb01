<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=web99";
    protected $user="root";
    protected $pw="";
    protected $table;
    protected $pdo;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
    }
    public function find($id){
        $sql="SELECT * FROM $this->table WHERE ";
        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .=" `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                $sql .="WHERE ".implode(" AND ".$arg[0])." ".$arg[1];

                break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= "WHERE ".implode(" AND ".$arg[0]);
                }else{
                    $sql .= $arg[1];
                }
            break;
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($method,$col,...$arg){
        $sql="SELECT $method($col) FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                $sql .="WHERE ".implode(" AND ".$arg[0])." ".$arg[1];

                break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= "WHERE ".implode(" AND ".$arg[0]);
                }else{
                    $sql .= $arg[1];
                }
            break;
        }
        
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function save($array){
        if(isset($array['id'])){
            // update
            foreach($array as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql="UPDATE $this->table 
                    SET ".implode(",",$tmp)." 
                    WHERE `id`='{$array['id']}'";
        }else{
            // insert
            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`)
                                   VALUES('".implode("','",$array)."')";

        }
        return $this->pdo->exec($sql);

    }
    
    public function del($id){
        $sql="DELETE * FROM $this->table WHERE ";
        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .=" `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

function to($url){
    header("location:".$url);
}

// 大寫變數代表資料表資料
$Total=new DB('total');
$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');

// 印出來看看有沒有連到(測試)

// $total=$Total->find(1);

// echo $Total->find(1)['total'];
// echo $total['total'];

// print_r($Total->all());

if(!isset($_SESSION['total'])){
    $total=$Total->find(1);
    // 資料拿出來(進站人數)+1
    $total['total']++;
    // 然後再存回去
    $Total->save($total);
    $_SESSION['total']=$total['total'];
}
?>