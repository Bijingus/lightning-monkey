function openMenu(id){
	var menu = jQuery(id);
	var width = jQuery(window).width() / 2;
    jQuery(menu).fadeIn();
	//jQuery(menu).css('pointer-events', 'all');
	data.open = true;
}
function closeMenu(id){
	var menu = jQuery(id);
	var width = jQuery(window).width() / 2;
    jQuery(menu).fadeOut();
	//jQuery(menu).css('pointer-events', 'none');
	data.open = false;
}

jQuery(document).ready(function(){

	jQuery('#menu-toggle-button').click(function(){
		if(data.open == false){
			openMenu('#fixed-primary-menu');
		}else{
			closeMenu('#fixed-primary-menu');
		}
	});

	var divWidth = jQuery('.right-home').width();
	jQuery('iframe').attr('width', divWidth);


});

data = {
	open: false,
}