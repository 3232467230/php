<?php
include_once "./tool/code/Verify.class.php";
$v = new Verify();
$is = $v->check('cslp');
if($is){
    echo "通过";
}else{
    echo "失败";
}