$(document).ready(function(e) {
	$('.arrow').tooltip();
	$('.popup').dialog({
		autoOpen: false,
		modal: true,
		resizable: false,
		draggable: false,
	});
	$('#datepicker').datepicker();
	
	init();
});

function init(){
	if($(window).width()>800){
		wideScreen();
	}else{
		mobileScreen();
	};
}

function wideScreen(){
	SC_MODE=1;
	$('a').tooltip({position: {
		my: "left+15 center", at: "right center"
	}});
	$('#sidebar').delay(500).fadeOut();	
	$('#sidebar_wrapper').hover(function(){
		$(this).find('#sidebar').fadeIn();
	}, function(){
		$(this).find('#sidebar').stop().fadeOut();
	});
	$('#date_wrapper').hover(function(){
		$('#picker, #date .arrow').fadeIn();
		$(this).height(106);
	}, function(){
		$(this).height('auto');
		$('#picker, #date .arrow').stop().fadeOut();
	});
	$('#date .arrow a').hover(function(){
		$(this).css('color', '#000');
	}, function(){
		$(this).css('color', '#c1c1c1');
	});
}

function mobileScreen(){
	SC_MODE=0;
	$('#content').click(function(){
		$('#sidebar #menu').hide();
	});
}

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
		if(SC_MODE) {$('#copyinfo, #date').toggle();}
		$(this).dequeue();
	});
	$('.screen_hover').delay(500).fadeOut();
}
