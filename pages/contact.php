<?php

	$form_vars = array();
	
	$form_vars['id'] = 'contact_form';
	$form_vars['class'] = 'elgg-form-alt';

	$body_vars = elgg_get_sticky_values('contact_form');
	
	if(elgg_is_logged_in())
	{
		$user = elgg_get_logged_in_user_entity();
		
		$body_vars['name'] = $user->name;
		$body_vars['mail'] = $user->email;
	}
	
	$body_vars['foot'] = 'test';
	
	$plugin_setting_contact_description = elgg_get_plugin_setting('contact_description', 'contact');
	$plugin_setting_contact_sidebar_description = elgg_get_plugin_setting('contact_sidebar_description', 'contact');
	
	$title = elgg_echo('contact:title');
	
	$content = elgg_view('output/longtext', array('value' => $plugin_setting_contact_description)) . '<br />';
	$content .= elgg_view_form('contact/send', $form_vars, $body_vars);	
	
	$sidebar = elgg_view('output/longtext', array('value' => $plugin_setting_contact_sidebar_description));

	$params['title'] = $title;
	$params['content'] = $content;
	$params['sidebar'] = $sidebar;
	$params['filter'] = '';
	
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);