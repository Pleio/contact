<?php

namespace ColdTrick\Contact;

/**
 * Functions related to captcha protection
 *
 * @package    ColdTrick
 * @subpackage Contact
 */
class Captcha {
	
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
	public function actionlist($hook, $type, $returnvalue, $params) {
		
		// add the contact action to the captcha validation
		$returnvalue[] = "contact/send";
		
		return $returnvalue;
	}
}