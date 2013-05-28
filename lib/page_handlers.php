<?php

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