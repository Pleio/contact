<?php 

	$english = array(
		'contact'												=> 'Contact',
	
		'contact:title' 										=> 'Contact',
	
		'contact:form:name:label' 								=> 'Name',
		'contact:form:mail:label' 								=> 'E-mailaddress',
		'contact:form:subject:label' 							=> 'Subject',
		'contact:form:message:label' 							=> 'Message',
		'contact:form:cc:label' 								=> 'Send me a copy of mail',
		
		'contact:form:required_fields:label'					=> '* = required field',
	
		'contact:mail:message:prepend'							=> 'This e-mail was sent bij the contact form: ',
	
		'contact:message:success'								=> 'Contact formulier successvol verzonden',
		'contact:message:required_fields'						=> 'Fill in the required fields',
		'contact:message:required_field'						=> 'This field is required',
		'contact:message:invalid_mail_address'					=> 'The mail address you entered is invalid',
		'contact:message:invalid_recipient_address' 			=> 'This form is confirgured with an invalid recipient address.',
	
		'contact:settings:wg_contact:label'						=> 'Show contact page/link while in walled garden mode',
		'contact:settings:recipient:label'						=> 'Contact form receiver',
		'contact:settings:contact_description:label' 			=> 'Page text: ',
		'contact:settings:contact_sidebar_description:label' 	=> 'Page sidebar text: ',
		'contact:settings:thankyou_title:label'					=> '"Thank you" page title',
		'contact:settings:thankyou_text:label'					=> '"Thank you" page text after contact form has been succesfully sent',
	);
	
	add_translation('en', $english);