$(document).ready(function(e) {
	HC_MODE=0;
	$('a').tooltip({position: {
		my: "left+15 center", at: "right center"
	}});
	$('.arrow').tooltip();
	$('.popup').dialog({
		autoOpen: false,
		modal: true,
		resizable: false,
		draggable: false,
	});
	$('#datepicker').datepicker();
	
	var id=0;
	id=setInterval('hideAll()', 1000);
    $('#content').mousemove(function(){
		clearInterval(id);
		$('#sidebar, #remarks, .arrow').fadeIn();
		id=setInterval('hideAll()', 1000);
	});
	$('#sidebar, #remarks, #date, #picker').mouseover(function(){
		clearInterval(id);
	});
	$('#date').hover(function(){
		$('#picker').stop('', true, true).show();
	}, function(){
		$('#picker').stop('', true, true).hide();
	});
	$('#date .arrow a').hover(function(){
		$(this).css('color', '#000');
	}, function(){
		$(this).css('color', '#c1c1c1');
	});
});

function hideAll(){
	$('#sidebar, #remarks, .arrow').fadeOut();
}

function highContract(){
	switch(HC_MODE){
		case 0:
			HC_MODE=1;
			$('.screen_hover').css('background-color', '#000');
			break;
		case 1:
			$('.screen_hover').css('background-color', '#fff');
			HC_MODE=0;
	}
	$('.screen_hover').fadeIn().queue(function(){
		$('.subject').toggleClass('hsubject');
		$('.items').toggleClass('hitems');
		$('#sidebar').toggleClass('hsidebar')
		$('body').toggleClass('hbody');
		$('#copyinfo, #date').toggle();
		$(this).dequeue();
	});
	$('.screen_hover').delay(500).fadeOut();
}
