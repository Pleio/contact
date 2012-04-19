<?php 

	function contact_image_captcha_actionlist_hook($hook, $entity_type, $returnvalue, $params)
	{
		if (!is_array($returnvalue))
		{
			$returnvalue = array();
		}
			
		$returnvalue[] = 'contact/send';
			
		return $returnvalue;
	}