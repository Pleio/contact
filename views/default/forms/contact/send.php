<?php
/**
 * Edit actie form
 *
 * @package actie
 */

$send_button = elgg_view('input/submit', array(
	'value' => elgg_echo('send'),
	'name' => 'send',
));

$name_label = elgg_echo('contact:form:name:label');
$name_input = elgg_view('input/text', array(
	'name' => 'name',
	'id' => 'contact_name',
	'class' => 'contact_required',
	'value' => $vars['name']
));

$mail_label = elgg_echo('email');
$mail_input = elgg_view('input/text', array(
	'name' => 'mail',
	'id' => 'contact_mail',
	'class' => 'contact_required',
	'value' => $vars['mail']
));

$subject_label = elgg_echo('contact:form:subject:label');
$subject_input = elgg_view('input/text', array(
	'name' => 'subject',
	'id' => 'contact_subject',
	'value' => $vars['subject']
));

$message_label = elgg_echo('contact:form:message:label');
$message_input = elgg_view('input/plaintext', array(
	'name' => 'message',
	'id' => 'contact_message',
	'class' => 'contact_required',
	'value' => $vars['message']
));

$cc_label = elgg_echo('contact:form:cc:label');
$cc_input = elgg_view('input/checkboxes', array(
	'name' => 'cc',
	'id' => 'contact_cc',
	'value' => $vars['cc'],
	'options' => array($cc_label => 1)
));

if(elgg_is_active_plugin('image_captcha'))
{
	$captcha_input = elgg_view('input/captcha');
}

$required_text = elgg_echo('contact:form:required_fields:label');

echo <<<___HTML

<div>
	<label for="contact_name">$name_label *:</label>
	$name_input
	<div class="contact-field-error" id="contact_name_error"></div>
</div>

<div>
	<label for="contact_mail">$mail_label *:</label>
	$mail_input
	<div class="contact-field-error" id="contact_mail_error"></div>
</div>

<div>
	<label for="contact_phone">$subject_label:</label>
	$subject_input
</div>

<div>
	<label for="contact_message">$message_label *:</label>
	$message_input
	<div class="contact-field-error" id="contact_message_error"></div>
</div>

<div>
	$cc_input	
</div>

<div>
	$captcha_input
</div>

<div class="elgg-foot">
	<label>$required_text</label><br /><br />
	$send_button
</div>

___HTML;
