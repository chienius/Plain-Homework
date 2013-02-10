
<div id="sidebar">
  <div id="menu">
    <ul>
      <?php if($page=='home') { ?>
      <li id="quicklog_brand">平台快速登录技术™</li>
      <li>
        <a href="<?=site_url('/home/tjyfz') ?>" target="_blank" title="使用同济一附中校园平台快速登录技术，有关详情，见IOLITE Project网站。">登录平台</a>
      </li>
      <li>
        <a href="<?=site_url('login/logout') ?>">退出登录</a>
      </li>
      <li>
        <a onclick="$('#popup1').dialog('open')" href="javascript: void(0)">使用帮助</a>
      </li>
      <li>
        <a href="<?=site_url('/sp/aboutus') ?>">关于我们</a>
      </li>
      <?php } else { ?>
      <?php if($page!='login') { ?>
      <li>
        <a style="color: #7c7c7c;" href="<?=site_url() ?>">←返回</a>
      </li>
      <?php } ?>
      <li>
        <a href="<?=site_url('/sp/privacy') ?>">隐私声明</a>
      </li>
      <li>
        <a href="<?=site_url('/sp/updatelog') ?>">更新记录</a>
      </li>
      <li>
        <a href="<?=site_url('/sp/aboutus') ?>">关于我们</a>
      </li>
      <?php } ?>
    </ul>
  </div>
  <div id="copyinfo">
      堇青石计划旗下项目
    (c) 2013 iCoud.
    (c) 2013 DiTe Assn.
    (c) 2013 同济大学第一附属中学.
    <a href="http://iolite.icoud.tk" target="_blank"></a>
  </div>
</div>
