<?php
/**
 * All page handlers are bundled here
 */

/**
 * The contact page handler
 *
 * @param array $page url segments
 *
 * @return bool
 */
function contact_page_handler($page) {
	
	switch ($page[0]) {
		case "thankyou":
			include(dirname(dirname(__FILE__)) . "/pages/thankyou.php");
			break;
		default:
			include(dirname(dirname(__FILE__)) . "/pages/contact.php");
			break;
	}

	return true;
}