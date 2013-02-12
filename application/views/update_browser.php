<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Plain Homework - 干净看作业 - 升级浏览器</title>
<style>
body, html {
	background-color: #999;
	width: 100%;
	height: 100%;
	margin: 0;
	padding: 0;
	font-family: '黑体', Arial, Helvetica, sans-serif
}
table {
	width: 100%;
	height: 100%;
	display: table;
	padding: 0;
	margin: 0;
}
td {
	display: table-cell;
	vertical-align: middle;
	height: 100%;
	width: 100%;
}
.content_wrapper {
	background-color: #fff;
	height: 360px;
}
h1 {
	padding-top: 30px;
}
.content {
	margin-left: auto;
	margin-right: auto;
	width: 720px;
}
.content p {
	color: #666;
	font-size: 15px;
}
.content .notes {
	font-size: 12px;
}
#e0_btn {
	width: 100%;
	text-align: center;
}
#e0_btn img {
	border: 0px;
	margin-right: 20px;
}
form {
	text-align: right;
}
input {
	border: 0px;
	background-color: #CCC;
	font-size: 16px;
	font-family: '黑体', Arial, Helvetica, sans-serif
	width: 220px;
	height: 35px;
}
</style>
</head>

<body>
<table cellpadding="0" cellspacing="0">
  <tr>
    <td><div class="content_wrapper">
        <div class="content">
          <h1>您需要升级浏览器</h1>
          <p>由于您的浏览器版本过低，我们建议您立即升级浏览器，以体验 Plain Homework 带给您的全部现代化功能。</p>
          <p>在下方的浏览器图标中选择您偏好的浏览器：</p>
	        <div id="e0_btn">
	          <a href="http://www.beautyoftheweb.cn/"><img src="<?=base_url() ?>assets/update_browser/msie.jpg" /></a>
	          <a href="http://firefox.com.cn/"><img src="<?=base_url() ?>assets/update_browser/firefox.jpg" /></a>
	          <a href="http://www.google.cn/intl/zh-CN/chrome/browser/"><img src="<?=base_url() ?>assets/update_browser/chrome.jpg" /></a>
	          <a href="http://www.opera.com/"><img src="<?=base_url() ?>assets/update_browser/opera.jpg" /></a>
	        </div>
          <br /><br />
          <p class="notes">若您暂时无法升级浏览器，我们将为您<b>禁用网站的部分高级功能</b>，并将每周弹出一次此提示。</p>
          <form method="post">
            <input type="submit" name="submit" value="暂不升级，并继续 (不推荐)" />
          </form>
        </div>
      </div></td>
  </tr>
</table>
</body>
</html>