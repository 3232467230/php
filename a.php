<?php

include "./tool/app.php";//工具类
include "./tool/mysql.php";

$mysql = new MMysql();
$data = array(
    'username'=>'Admin',
    'password'=>'666666asdd',
    'email'=>'3232467230@qq.com',
    'regtime'=>time(),
    );
$res = $mysql->insert('demo1', $data);
if($res){
    $id = $mysql->getID("username","Admin");//根据条件获取ID
    tw(0,$id);
}else{
    tw(0,"数据上传失败");
}





// echo json_encode($resd, JSON_FORCE_OBJECT);
