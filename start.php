<?php

	require_once(dirname(__FILE__) . "/lib/hooks.php");
	require_once(dirname(__FILE__) . "/lib/page_handlers.php");

	elgg_register_event_handler("init", "system", "contact_init");
	
	function contact_init()	{
		// extend CSS / JS
		elgg_extend_view("css/elgg", "css/contact/site");
		elgg_extend_view("js/elgg", "js/contact/site");

		// register page handler for nice URL's
		elgg_register_page_handler("contact", "contact_page_handler");

		// register actions
		elgg_register_action("contact/send", dirname(__FILE__) . "/actions/send.php", "public");
		
		// register plugin hooks
		elgg_register_plugin_hook_handler("public_pages", "walled_garden", "contact_public_pages_hook");
		elgg_register_plugin_hook_handler("register", "menu:walled_garden", "contact_register_menu_walled_garden_hook");
		elgg_register_plugin_hook_handler("register", "menu:footer", "contact_register_menu_footer_hook");
		elgg_register_plugin_hook_handler("actionlist", "captcha", "contact_image_captcha_actionlist_hook");
	}
	
	
		