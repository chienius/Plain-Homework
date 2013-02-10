
<div id="container">
  <p style="margin-top:185px; font-size: 20px; font-weight: bold;">使用校园平台用户名密码直接登录</p>
  <p style="color: red; font-size: 15px"><?php if($errorcode=='e1') { ?>用户名和密码为必填项。<?php }elseif($errorcode=='e2'){ ?>用户名或密码组合错误，请重试。<?php } ?></p>
  <form method="post" action="<?=site_url('login/action') ?>">
    <input name="stuid" style="border:solid #b5b5b5 1px; width: 300px; height: 30px; font-size: 24px;font-family:'黑体'" type="text" value="用户名" onfocus="if(this.value=='用户名'){this.value=''}" /><br /><br />
    <input name="pwd" style="border:solid #b5b5b5 1px; width: 300px; height: 30px; font-size: 24px;" value="···" type="password" onfocus="if(this.value=='···'){this.value=''}" /><br /><br />
    <input name="autologin" checked="checked" type="checkbox" value="1" /><span style="font-size: 12px;">自动登录(一个月有效)</span><br />
    <input name="submit" style="border:0px; width: 300px; height: 30px; font-size: 24px; background-color:#fff;font-family:'黑体'" type="submit" value="登录" /><br />
  </form><br /><br />
  <p style="color: #b7b7b7; font-size: 12px;">担心您的隐私权利受到威胁？请阅读我们的&nbsp;<a href="<?=site_url('sp/privacy') ?>" style="text-decoration: none; color: #000;">隐私声明</a>&nbsp;。</p> 
</div>