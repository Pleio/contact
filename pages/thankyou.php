<?php
	
	$plugin_setting_thankyou_title = elgg_get_plugin_setting('thankyou_title', 'contact');
	$plugin_setting_thankyou_text = elgg_get_plugin_setting('thankyou_text', 'contact');
	$plugin_setting_contact_sidebar_description = elgg_get_plugin_setting('contact_sidebar_description', 'contact');
	
	$content = elgg_view('output/longtext', array('value' => $plugin_setting_thankyou_text));	
	$sidebar = elgg_view('output/longtext', array('value' => $plugin_setting_contact_sidebar_description));

	$params['title'] = $plugin_setting_thankyou_title;
	$params['content'] = $content;
	$params['sidebar'] = $sidebar;
	$params['filter'] = '';
	
	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);