function next(name){
	let ok =0;
	let page = $("."+name);
	for(i = 0 ; i < page.length ; i++){
		let type = $(page[i]).css('display');
		if(type == 'block'){
			$(page[i]).css('display','none');

			j=i+1;
			$(page[j]).css('display','block');
			ok =1;
		}
		if (i== (page.length-1)) {
			$(page[i]).css('display','block');
		}
		if(ok ==1){
		break;
		}

		
	}

}
function prev(name){
	let ok =0;
	let page = $("."+name);
	let p = page.length - 1;
	for(i = p ; i >= 0 ; i--){
		let type = $(page[i]).css('display');
		if(type == 'block'){
			$(page[i]).css('display','none');
			j=i-1;
			$(page[j]).css('display','block');
			ok =1;
		}
		if (i== 0) {
			$(page[i]).css('display','block');
		}
		if(ok ==1){
		break;
		}
		
	}

}
function showCart(){
	    $("#mycart").fadeToggle();

}
function showMore(){
		$('.more').toggle();
}

var index = 0;

cmt();
setInterval(cmt, 4000); 

function cmt(){

	let ok =0;
	let page = $(".cmt-detail");
	limit= page.length-1;
	for (i = 0; i < page.length; i++) {
    page[i].style.display = "none";  
  	}
	$(page[index]).css('display','block');
	
	index++;
	if(index>limit){index=0;
	}
		
	
}
back();	
function back() {
	$(window).scroll(function(event) {
		var scroll = $(window).scrollTop();
				
		if (scroll > 600) {
			$('.back-to-top').show();
		} else {
			$('.back-to-top').hide(500);
		}
	})

	$('.back-to-top').click(function() {
				$("html, body").animate({scrollTop: 0}, "slow");
	})
}
function showProduct(name){
	switch(name){
		case 'new-product':
			$(".new-product").css('display','block');
			$(".feature-product").css('display','none');
			$(".best-product").css('display','none');
			$(".name2").css('border-bottom','3px solid #7cd0f5');
			$(".name1").css('border-bottom','none');
			$(".name3").css('border-bottom','none');
			break;
		case 'feature-product':
			$(".feature-product").css('display','block');
			$(".new-product").css('display','none');
			$(".best-product").css('display','none');
			$(".name1").css('border-bottom','3px solid #7cd0f5');
			$(".name2").css('border-bottom','none');
			$(".name3").css('border-bottom','none');
			break;
		case 'best-product':
			$(".feature-product").css('display','none');
			$(".best-product").css('display','block');
			$(".new-product").css('display','none');
			$(".name3").css('border-bottom','3px solid #7cd0f5');
			$(".name1").css('border-bottom','none');
			$(".name2").css('border-bottom','none');
			break;

	}
}
function showHome(){
	$(".showHome").toggle();
}