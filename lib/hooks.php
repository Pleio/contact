<?php

	function contact_image_captcha_actionlist_hook($hook, $type, $returnvalue, $params) {
		$result = $returnvalue;
		
		// add the contact action to the captcha validation
		$result[] = "contact/send";
			
		return $result;
	}
	
	function contact_public_pages_hook($hook, $type, $returnvalue, $params) {
		$result = $returnvalue;
		
		if (elgg_get_plugin_setting("wg_contact", "contact") == "yes") {
			// add the contact pages to the allowed walled garden pages
			$result[] = "contact";
			$result[] = "contact/thankyou";
			$result[] = "action/contact/send";
		}
		
		return $result;
	}
	
	function contact_register_menu_walled_garden_hook($hook, $type, $returnvalue, $params) {
		$result = $returnvalue;
		
		if (elgg_get_plugin_setting("wg_contact", "contact") == "yes") {
			// add a menu item to the contact form
			$result[] = ElggMenuItem::factory(array(
				"name" => "contact",
				"text" => elgg_echo("contact:title"),
				"href" => "contact"
			));
		}
		
		return $result;
	}
	
	function contact_register_menu_footer_hook($hook, $type, $returnvalue, $params) {
		$result = $returnvalue;
		
		// add a menu item to the contact form
		$result[] = ElggMenuItem::factory(array(
			"name" => "contact",
			"text" => elgg_echo("contact:title"),
			"href" => "contact"
		));
		
		return $result;
	}