<?php

// make sure we keep the content on error
elgg_make_sticky_form("contact_form");

$name = get_input("name");
$email = get_input("email");
$subject = get_input("subject");
$message = get_input("message");
$cc = get_input("cc");

$forward_url = REFERER;
$error = false;

// check required fields
$required_fields = array("name", "email", "message");

foreach ($required_fields as $required_name) {
	if (!get_input($required_name)) {
		$error = true;
		
		register_error(elgg_echo("NotificationException:MissingParameter", array(elgg_echo("contact:form:" . $required_name . ":label"))));
	} elseif (($required_name == "email") && !is_email_address($email)) {
		$error = true;
		
		register_error(elgg_echo("registration:notemail"));
	}
}

// errors found?
if (empty($error)) {
	
	if (($contact_recipient = elgg_get_plugin_setting("recipient", "contact")) && is_email_address($contact_recipient)) {
		$mailmessage = elgg_echo("contact:mail:message:prepend") 	. PHP_EOL . PHP_EOL .
						elgg_echo("contact:form:name:label") 		. ": " . $name . PHP_EOL .
						elgg_echo("contact:form:mail:label") 		. ": " . $email . PHP_EOL .
						elgg_echo("contact:form:message:label") 	. ": " . $message;

		$params = array();
		if (!empty($cc)) {
			$params["cc"] = array($email);
		}

		elgg_send_email($email, $contact_recipient, $subject, $mailmessage, $params);

		elgg_clear_sticky_form("contact_form");

		system_message(elgg_echo("contact:message:success"));
		
		if (elgg_get_plugin_setting("thankyou_text", "contact")) {
			$forward_url = "contact/thankyou";
		} else {
			$forward_url = "";
		}
	} else {
		register_error(elgg_echo("contact:message:invalid_recipient_address"));
	}
}

forward($forward_url);
