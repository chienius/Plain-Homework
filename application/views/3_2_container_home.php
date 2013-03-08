<?php 
date_default_timezone_set('Asia/Shanghai');
switch(date('w', $date)){
	case '1':
		$week='周一';
		break;
	case '2':
		$week='周二';
		break;
	case '3':
		$week='周三';
		break;
	case '4':
		$week='周四';
		break;
	case '5':
		$week='周五';
		break;
	case '6':
		$week='周六';
		break;
	case '0':
		$week='周日';
		break;
}
$pastday=date('Ymd', $date-86400);
$nextday=date('Ymd', $date+86400);
if((!$today)&&$nextday>date('Ymd'))
	$today=TRUE;
?>
<div class="popup" id="popup3" title="选择日期">
  <div id="datepicker"></div>
  <input onclick="_customDate()" type="submit" value="跳转" />
</div>
<div class="popup" id="popup1" title="使用帮助">
	<p>用起来很简单的啦~ 帮助什么的不需要的啦~</p>
	<p>实际上帮助还在准备中...抱歉...因为时间来不及。</p>
	<p>如果实在有用不来的，欢迎来<a href="<?=site_url('/sp/aboutus') ?>">找我们</a>哦！</p>
</div>
<script>
function _customDate(){
	window.location.href = '<?=site_url('/home/main') ?>'+'/'+date1+'/customized';
}
</script>

<div id="container">
  <div id="date">
    <span class="arrow"><a href="<?=site_url('/home/main/'.$pastday.'/past') ?>"><</a></span>
    <span id="date_a"><?php echo date('n月j日', $date).'&nbsp;'.$week; ?></span>
    <?php if($today) { ?>
    <span class="arrow" title="之后没有作业了哦！">></span>
    <?php }else{ ?>
    <span class="arrow"><a href="<?=site_url('/home/main/'.$nextday.'/next') ?>">></a></span>
    <?php } ?>
    <div id="picker">
      <?php if(!$today) {?><a href="<?=site_url() ?>">转到今日</a> | <?php } ?><a onclick="$('#popup3').dialog('open');$('#datepicker').datepicker('open');" href="javascript:void(0)">指定日期</a>
    </div>
  </div>

  <div id="content">
      <ul class="subject">
      	<?php
      	if($recent_no_work){
			echo '最近10日内无作业。';
      	}elseif($homework=='0'){
      		echo "该日无作业。";
		}else{
			foreach($homework as $key=>$hwitem){
				if($key%2==1) {
					//This is a caption
					$hwitem=preg_replace('/高\D+\(\d+\)/u', '', $hwitem);
					echo '<li>';
					echo $hwitem;
					echo '</li>';
				}else{
					//This is homework item
					echo '<ul class="items">';
					$hwitem1=preg_replace('/p>/i', 'li>', $hwitem);
					$hwitem1=preg_replace('/<li>(&nbsp;)+<\/li>/i', '', $hwitem1);	//除去空白项目
					$hwitem1=preg_replace('/style=\".*\"/i', '', $hwitem1);	//除去HTML样式
					if($hwitem1==$hwitem){
						echo $hwitem1='<li>'.$hwitem1.'</li>';
					}else{
						echo $hwitem1;
					}
					echo '</ul>';
				}
			}
		}
      	?>
      </ul>
  </div>
</div>