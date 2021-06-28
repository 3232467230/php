<?php
//微信登录
include "./tool/app.php";//工具类
include "./tool/mysql.php";
include "./tool/https.php";

$appid = "wx9c792dd830772393";			//开发平台申请
$appsecret =  "8f83399dc0835f2c7b98d45c13f0fb0b";		//开发平台申请
$code = $_GET['code'];
//认证
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code ."&grant_type=authorization_code";



$mysql = new MMysql();
//调用微信api
$http = new ddhttp();
$rs = $http -> get($url);
if (!$rs) {
    $this -> error('获取OPENID失败');
}

$rt = json_decode($rs, 1);
if ($rt['errcode']) {
    tw(0, "授权失败".$rt['errmsg']);
}

// 拉取用户信息
$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$rt['access_token']."&openid=".$rt['openid']."&lang=zh_CN ";
$wechat_info = $http -> get($url);
if (!$wechat_info) {
    $this -> error('获取用户资料失败:CURL '.$http -> errmsg);
}

$wechat_info = json_decode($wechat_info, 1);
if ($wechat_info['errcode']) {
    $this -> error("获取用户资料失败".$wechat_info['errmsg']);
}
$user_info = array(
    "headimg"=>$wechat_info['headimgurl'],	//头像
    "nickname"=>$wechat_info['nickname'],	//昵称
    "sex"=>$wechat_info['sex'],				//性别
    "openid"=>$wechat_info['openid'],		//app唯一
    "unionid"=>$wechat_info['unionid']		//微信内部唯一，小程序， 公众号， web， 移动应用都是一致的
);
echo $user_info;
// tw(1, $user_info);

// $res = $mysql->_doQuery("SELECT * FROM demo1 WHERE username='Beijing'");
// $data = array(
//     'username'=>$name,
//     'password'=>$password,
//     'balance' => 0,
//     'regtime'=>time(),
//     );
// $res = $mysql->insert('demo1', $data);
// if($res){
//     $id = $mysql->getID("username","Admin");//根据条件获取ID
//     tw(0,$id);
// }else{
//     tw(0,"数据上传失败");
// }


$mysql->close();