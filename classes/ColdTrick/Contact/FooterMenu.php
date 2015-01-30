<?php

namespace ColdTrick\Contact;

/**
 * Extend the footer menu
 *
 * @package    ColdTrick
 * @subpackage Contact
 */
class FooterMenu {
	
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
	public function register($hook, $type, $returnvalue, $params) {
		
		// add a menu item to the contact form
		$returnvalue[] = \ElggMenuItem::factory(array(
			"name" => "contact",
			"text" => elgg_echo("contact:title"),
			"href" => "contact"
		));
		
		return $returnvalue;
	}
}