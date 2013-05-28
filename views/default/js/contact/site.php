<?php ?>
//<script>
elgg.provide('elgg.contact');

elgg.contact.init = function() {
	
	$('#contact_form').live('submit', function() {
		var result = false;
		var error_count = 0;

		$('#contact_form .contact-missing').removeClass('contact-missing');
		
		$('#contact_form input[type="text"][rel="required"]').each(function(index, elem) {
			if ($(elem).val() == "") {
				$(elem).addClass("contact-missing");

				error_count++;
			}
		});

		$('#contact_form textarea[rel="required"]').each(function(index, elem) {
			if ($(elem).val() == "") {
				$('#contact_form').find('label[for="' + $(elem).attr('id') + '"]').addClass('contact-missing');
				
				error_count++;
			}
		});

		if (error_count > 0) {
			alert(elgg.echo("contact:form:error"));
		} else {
			result = true;
		}

		return result;
	});
}

elgg.register_hook_handler('init', 'system', elgg.contact.init);