<?php

	elgg_make_sticky_form('contact_form');

	$form_vars = elgg_get_sticky_values("contact_form");	

	$required_fields = array('name', 'mail', 'message');
	
	if(elgg_is_admin_logged_in())
	{
		/*echo '<pre>';
		var_dump($form_vars);
		echo '</pre>';
		die();*/
	}
	
	foreach($form_vars as $name => $value)
	{
		if(in_array($name, $required_fields) && empty($value))
		{
			echo $name;
			die();
			$error_count++;
			register_error(elgg_echo("contact:message:required_fields"));
			break;
		}

		if($name == 'mail')
		{
			if(!is_email_address($value))
			{
				$error_count++;
				register_error(elgg_echo("contact:message:invalid_mail_address"));
			}
		}
	}

	if(empty($error_count))
	{
		global $CONFIG;

		$plugin_setting_contact_recipient = elgg_get_plugin_setting('recipient', 'contact');
		if(is_email_address($plugin_setting_contact_recipient))
		{
			$mailmessage =  elgg_echo('contact:mail:message:prepend') 	. PHP_EOL . PHP_EOL .
							elgg_echo('contact:form:name:label') 		. ': ' . $form_vars['name'] . PHP_EOL . 
							elgg_echo('contact:form:mail:label') 		. ': ' . $form_vars['mail'] . PHP_EOL . 
							elgg_echo('contact:form:message:label') 	. ': ' . $form_vars['message'];

			if($form_vars['cc'])
			{
				$params['cc'] = array($form_vars['mail']);
			}

			elgg_send_email($form_vars['mail'], $plugin_setting_contact_recipient, $form_vars['subject'], $mailmessage, $params);

			elgg_clear_sticky_form('contact_form');

			system_message(elgg_echo('contact:message:success'));
			
			$plugin_setting_thankyou_title = elgg_get_plugin_setting('thankyou_title', 'contact');
			$plugin_setting_thankyou_text = elgg_get_plugin_setting('thankyou_text', 'contact');
			
			if($plugin_setting_thankyou_title && $plugin_setting_thankyou_text)
			{
				forward('contact/thankyou');
			}
			
			forward();
		}
		else
		{
			register_error(elgg_echo("contact:message:invalid_recipient_address"));
		}
	}

	forward(REFERER);