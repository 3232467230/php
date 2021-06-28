<?php
header('Content-Type:application/json; charset=utf-8');
/**
* 数据输出
* @param int $code 代码
* @param var $msg 内容
*/
function tw($code, $msg)
{
    $arr = array('code'=>$code,'msg'=>$msg);
    exit(json_encode($arr));
}
/**
     * 测试生成短链接
     */
    function testCreateUrl()
    {
        $url = 'http://www.9douyu.com';
        $shortUrl = ShortUrl::getShortUrl($url);
        $this->assertNotEmpty($shortUrl, $shortUrl);
        echo "\nResult:" . $shortUrl;
    }
