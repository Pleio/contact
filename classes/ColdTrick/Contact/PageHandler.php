<?php

namespace ColdTrick\Contact;

/**
 * The page handler for /contact
 *
 * @package    ColdTrick
 * @subpackage Contact
 */
class PageHandler {
	
	/**
	 * The contact page handler
	 *
	 * @param array $page url segments
	 *
	 * @return bool
	 */
	public function contact($page) {
		
		$pages_path = elgg_get_plugins_path() . "contact/pages/";
		
		switch ($page[0]) {
			case "thankyou":
				include($pages_path . "thankyou.php");
				break;
			default:
				include($pages_path . "contact.php");
				break;
		}
		
		return true;
	}
}