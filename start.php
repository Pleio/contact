<?php

	require_once(dirname(__FILE__) . '/lib/hooks.php');

	function contact_init()
	{	
		elgg_extend_view("css/elgg", "contact/css/site");
		elgg_extend_view("js/elgg", "contact/js");

		elgg_register_page_handler('contact', 'contact_page_handler');		

		$action_path = elgg_get_plugins_path() . 'contact/actions/contact';		
		elgg_register_action('contact/send', $action_path . '/send.php', 'public');
		
		$plugin_setting_walled_garden_contact = elgg_get_plugin_setting('wg_contact');
		
		if($plugin_setting_walled_garden_contact == 'yes')
		{
			$wg_contact_item = new ElggMenuItem('contact', elgg_echo("contact:title"), 'contact');
			elgg_register_menu_item('walled_garden', $wg_contact_item);
			
			elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'contact_public_pages');
		}
		
		if(elgg_is_active_plugin('image_captcha'))
		{
			elgg_register_plugin_hook_handler('actionlist', 'captcha', 'contact_image_captcha_actionlist_hook');
		}
		
	}
	
	function contact_public_pages($hook, $handler, $return, $params)
	{
		$pages = array('contact', 'contact/thankyou', 'action/contact/send');
		return array_merge($pages, $return);
	}

	function contact_page_handler($page)
	{
		switch ($page[0]) 
		{
			case 'thankyou':
				include(dirname(__FILE__)."/pages/thankyou.php");
				break;
			default:
				include(dirname(__FILE__)."/pages/contact.php");
				break;
		}
		
		return true;
	}

	
	elgg_register_plugin_hook_handler('action', 'contact/send', 'contact_action_send_hook');
	
	elgg_register_event_handler('init', 'system', 'contact_init');