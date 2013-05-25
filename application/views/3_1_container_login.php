
<div id="container">
  <p style="margin-top:185px; font-size: 20px; font-weight: bold;">使用校园平台学籍号密码直接登录</p>
  <p style="color: red; font-size: 15px"><?php if($errorcode=='e1') { ?>学籍号和密码为必填项。<?php }elseif($errorcode=='e2'){ ?>学籍号和密码组合错误，请重试。<?php } ?></p>
  <?php
  $stuid=array(
  	'name'=>'stuid',
  	'style'=>"border:solid #b5b5b5 1px; width: 300px; height: 30px; font-size: 24px;font-family:'黑体'",
  	'value'=>'学籍号',
  	'onfocus'=>"if(this.value=='学籍号'){this.value=''}"
  );
  $pwd=array(
  	'name'=>'pwd',
  	'style'=>"border:solid #b5b5b5 1px; width: 300px; height: 30px; font-size: 24px;",
  	'value'=>"···",
  	'onfocus'=>"if(this.value=='···'){this.value=''}"
  );
  $autologin=array(
  	'name'=>'autologin',
  	'checked'=>'checked',
  	'value'=>'1'
  );
  $submit=array(
  	'name'=>'submit',
	'style'=>"border:0px; width: 300px; height: 30px; font-size: 24px; background-color:#fff;font-family:'黑体'",
	'value'=>'登录'
  );
  
  echo form_open(site_url('login/action'));
  echo form_input($stuid);
  echo "<br><br>";
  echo form_password($pwd);
  echo "<br><br>";
  echo form_checkbox($autologin);
  echo '<span style="font-size: 12px;">自动登录(一个月有效)</span><br />';
  echo form_submit($submit);
  echo "<br>";
  echo form_close();
  ?>
  <br /><br />
  <p style="color: #b7b7b7; font-size: 12px;">担心您的隐私权利受到威胁？请阅读我们的&nbsp;<a href="<?=site_url('sp/privacy') ?>" style="text-decoration: none; color: #000;">隐私声明</a>&nbsp;。</p> 
</div>