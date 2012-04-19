elgg.provide('elgg.contact');

elgg.contact.check_required_fields = function(element)
{
	var result = true;
	
	$.each($('.contact_field_error'), function(i, value)
	{
		$input = $('#' + $(value).attr('id').replace('_error', ''));
		if($input.val() == '')
		{
			$(value).html(elgg.echo('contact:message:required_field'));
			$(value).css('visibility', 'visible');
			result = false;
		}
	});

	return result;
}

elgg.contact.init = function()
{
	$('#contact_form').submit(function(e)
	{
		if(elgg.contact.check_required_fields() != true)
		{
			e.preventDefault();
		}
	});

	$('.contact_required').bind('keyup blur', function(e)
	{
		if($(this).val() != '')
		{
			$('#' + $(this).attr('id') + '_error').css('visibility', 'hidden');
		}
		else
		{
			$('#' + $(this).attr('id') + '_error').html(elgg.echo('contact:message:required_field'));
			$('#' + $(this).attr('id') + '_error').css('visibility', 'visible');
		}
	});

	$('#contact_mail').bind('change blur', function()
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = $(this).val();

		if($(this).val() != '')
		{
			if(reg.test(address) == false)
			{
				$('#contact_mail_error').html(elgg.echo('registration:notemail'));
				$('#contact_mail_error').css('visibility', 'visible');
			}
		}
		else
		{
			$('#contact_mail_error').html(elgg.echo('contact:message:required_field'));
			$('#contact_mail_error').css('visibility', 'visible');
		}
	});
}

elgg.register_hook_handler('init', 'system', elgg.contact.init);