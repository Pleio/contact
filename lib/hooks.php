<?php
/**
 * All plugin hooks are bundled here
 */

/**
 * protect this form with a captcha
 *
 * @param string $hook        the name of the hook
 * @param string $type        the type of the hook
 * @param array  $returnvalue current return value
 * @param array  $params      supplied params
 *
 * @return array
 */
function contact_image_captcha_actionlist_hook($hook, $type, $returnvalue, $params) {
	
	// add the contact action to the captcha validation
	$returnvalue[] = "contact/send";
		
	return $returnvalue;
}

/**
 * Allow this plugin to work in walled garden mode
 *
 * @param string $hook        the name of the hook
 * @param string $type        the type of the hook
 * @param array  $returnvalue current return value
 * @param array  $params      supplied params
 *
 * @return array
 */
function contact_public_pages_hook($hook, $type, $returnvalue, $params) {
	
	if (elgg_get_plugin_setting("wg_contact", "contact") == "yes") {
		// add the contact pages to the allowed walled garden pages
		$returnvalue[] = "contact";
		$returnvalue[] = "contact/thankyou";
		$returnvalue[] = "action/contact/send";
	}
	
	return $returnvalue;
}

/**
 * Add a menu item to the walled garden menu
 *
 * @param string         $hook        the name of the hook
 * @param string         $type        the type of the hook
 * @param ElggMenuItem[] $returnvalue current return value
 * @param array          $params      supplied params
 *
 * @return ElggMenuItem[]
 */
function contact_register_menu_walled_garden_hook($hook, $type, $returnvalue, $params) {
	
	if (elgg_get_plugin_setting("wg_contact", "contact") == "yes") {
		// add a menu item to the contact form
		$returnvalue[] = ElggMenuItem::factory(array(
			"name" => "contact",
			"text" => elgg_echo("contact:title"),
			"href" => "contact"
		));
	}
	
	return $returnvalue;
}

/**
 * Add a menu item to the footer menu
 *
 * @param string         $hook        the name of the hook
 * @param string         $type        the type of the hook
 * @param ElggMenuItem[] $returnvalue current return value
 * @param array          $params      supplied params
 *
 * @return ElggMenuItem[]
 */
function contact_register_menu_footer_hook($hook, $type, $returnvalue, $params) {
	
	// add a menu item to the contact form
	$returnvalue[] = ElggMenuItem::factory(array(
		"name" => "contact",
		"text" => elgg_echo("contact:title"),
		"href" => "contact"
	));
	
	return $returnvalue;
}