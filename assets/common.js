$(document).ready(function(e) {
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
	
	$('#sidebar_wrapper').hover(function(){
		$(this).find('#sidebar').fadeIn();
	}, function(){
		$(this).find('#sidebar').fadeOut();
	});
	$('#date_wrapper').hover(function(){
		$('#picker, #date .arrow').stop().fadeIn();
	}, function(){
		$('#picker, #date .arrow').stop().fadeOut();
	});
	$('#date .arrow a').hover(function(){
		$(this).css('color', '#000');
	}, function(){
		$(this).css('color', '#c1c1c1');
	});
});

var HC_MODE=0;
function highContract(){
	switch(HC_MODE){
		case 0:
			HC_MODE=1;
			$('.screen_hover').css('background-color', '#000');
			break;
		case 1:
			$('.screen_hover').css('background-color', '#fff');
			HC_MODE=0;
	};
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
