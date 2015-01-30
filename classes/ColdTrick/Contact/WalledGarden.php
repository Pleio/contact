<?php

namespace ColdTrick\Contact;

/**
 * Functions related to Walled Garden mode
 *
 * @package    ColdTrick
 * @subpackage Contact
 */
class WalledGarden {
	
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
	public function publicPages($hook, $type, $returnvalue, $params) {
		
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
	public function menu($hook, $type, $returnvalue, $params) {
		
		if (elgg_get_plugin_setting("wg_contact", "contact") === "yes") {
			// add a menu item to the contact form
			$returnvalue[] = \ElggMenuItem::factory(array(
				"name" => "contact",
				"text" => elgg_echo("contact:title"),
				"href" => "contact"
			));
		}
		
		return $returnvalue;
	}
}