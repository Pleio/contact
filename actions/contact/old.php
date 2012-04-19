<?php

	elgg_make_sticky_form('contact_form');

	$form_vars = elgg_get_sticky_values("contact_form");	

	$required_fields = array('name', 'mail', 'message');

	foreach($form_vars as $name => $value)
	{
		if(in_array($name, $required_fields) && empty($value))
		{
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

			$boundary = uniqid($CONFIG->site->name);

			$headers = "From: " . $form_vars['name'] . ' <'. $form_vars['mail'] . '>' . PHP_EOL;
			$headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-Type: multipart/alternative; boundary=\"" . $boundary . "\"" . PHP_EOL . PHP_EOL;

			$message = "--" . $boundary . PHP_EOL;
			$message .= "Content-Type: text/plain; charset=\"utf-8\"" . PHP_EOL;
			$message .= "Content-Transfer-Encoding: base64" . PHP_EOL . PHP_EOL; 				
			$message .= chunk_split(base64_encode($mailmessage)) . PHP_EOL . PHP_EOL;				
			$message .= "--" . $boundary . "--" . PHP_EOL;

			mail($plugin_setting_contact_recipient, elgg_echo('contact:mail:message:prepend') . PHP_EOL . $form_vars['subject'], $message, $headers);

			if($form_vars['cc'])
			{
				$mailmessage =  elgg_echo('contact:form:name:label') 		. ': ' . $form_vars['name'] . PHP_EOL . 
								elgg_echo('contact:form:mail:label') 		. ': ' . $form_vars['mail'] . PHP_EOL . 
								elgg_echo('contact:form:message:label') 	. ': ' . $form_vars['message'];
								
								
				$message = "--" . $boundary . PHP_EOL;
				$message .= "Content-Type: text/plain; charset=\"utf-8\"" . PHP_EOL;
				$message .= "Content-Transfer-Encoding: base64" . PHP_EOL . PHP_EOL; 				
				$message .= chunk_split(base64_encode($mailmessage)) . PHP_EOL . PHP_EOL;				
				$message .= "--" . $boundary . "--" . PHP_EOL;
								
				mail($form_vars['mail'], $form_vars['subject'], $message, $headers);
			}			

			elgg_clear_sticky_form('contact_form');

			system_message(elgg_echo('contact:message:success'));
			forward('contact/thankyou');
		}
		else
		{
			register_error(elgg_echo("contact:message:invalid_recipient_address"));
		}
	}

	forward(REFERER);