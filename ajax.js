function yourname_open_login_dialog(href){

	jQuery('#yourname-user-modal .modal-dialog').removeClass('registration-complete');

	var modal_dialog = jQuery('#yourname-user-modal .modal-dialog');
	modal_dialog.attr('data-active-tab', '');

	switch(href){

		case '#yourname-register':
			modal_dialog.attr('data-active-tab', '#yourname-register');
			break;

		case '#yourname-login':
		default:
			modal_dialog.attr('data-active-tab', '#yourname-login');
			break;
	}

	jQuery('#yourname-user-modal').modal('show');
}	

function yourname_close_login_dialog(){

	jQuery('#yourname-user-modal').modal('hide');
}	

jQuery(function($){

	"use strict";
	/***************************
	**  LOGIN / REGISTER DIALOG
	***************************/

	// Open login/register modal
	$('[href="#yourname-login"], [href="#yourname-register"]').click(function(e){

		e.preventDefault();

		yourname_open_login_dialog( $(this).attr('href') );

	});

	// Switch forms login/register
	$('.modal-footer a, a[href="#yourname-reset-password"]').click(function(e){
		e.preventDefault();
		$('#yourname-user-modal .modal-dialog').attr('data-active-tab', $(this).attr('href'));
	});


	// Post login form
	$('#yourname_login_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(yournameajax.ajaxurl, $('#yourname_login_form').serialize(), function(data){

			var obj = $.parseJSON(data);

			$('.yourname-login .yourname-errors').html(obj.message);
			
			if(obj.error == false){
				$('#yourname-user-modal .modal-dialog').addClass('loading');
				window.location.reload(true);
				button.hide();
			}

			button.button('reset');
		});

	});


	// Post register form
	$('#yourname_registration_form').on('submit', function(e){

		e.preventDefault();

		var button = $(this).find('button');
			button.button('loading');

		$.post(yournameajax.ajaxurl, $('#yourname_registration_form').serialize(), function(data){
			
			var obj = $.parseJSON(data);

			$('.yourname-register .yourname-errors').html(obj.message);
			
			if(obj.error == false){
				$('#yourname-user-modal .modal-dialog').addClass('registration-complete');
				// window.location.reload(true);
				button.hide();
			}

			button.button('reset');
			
		});

	});

	if(window.location.hash == '#login'){
		yourname_open_login_dialog('#yourname-login');
	}		

});