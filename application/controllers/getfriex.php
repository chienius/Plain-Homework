<?php

// 函数名称：getFriEx
// 作用：根据指定的账户名和密码获取友情交流的内容
// 备注：谷歌翻译声称“友情交流”是“FRIendly EXchange”
function getFriEx($stuid, $pwd)
{
    $host = 'http://www.tjyfz1.edu.sh.cn';
    $verifypage = '/chsr1.asp';
    $friexpage = '/cjcx/xuesheng/main/yqts.asp?xsk=xs1';
    $loginpost = 'userid=' . urlencode($stuid) . '&pwd=' . urlencode($pwd) . '&leibie=xuesheng&SUBMIT=Send';
    $cookiejar = 'cookie.txt';
    $page = '';
    
    // 首先，我们需要登录/chsr1.asp获取cookie
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host . $verifypage);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $loginpost);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiejar);
    curl_exec($ch);
    curl_close($ch);
    
    // 然后我们需要带着cookie访问友情交流
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host . $friexpage);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiejar);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $page = curl_exec($ch);
    return iconv('GBK', 'UTF-8', $page);
}

// 函数名称：splitFriEx
// 作用：将getFriEx返回的原始网页拆分为数组返回
function splitFriEx($friex)
{
    //TODO: 完成本部分代码编写
}

// 函数名称：tagArr
// 作用：
//   1、尝试将不规范的HTML标签更改为符合标准的格式
//   2、将站内链接转换为站外链接
//   3、待定（what?）
function tagArr($origin)
{
    //TODO: 完成本部分代码编写
}

// 测试用代码
// echo '<!-- ' . getFriEx('3101103002320111023', '#!lusiyuanwabakadesu3395');
    
?>
