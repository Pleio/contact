<?php

if ($description = elgg_get_plugin_setting("contact_sidebar_description", "contact")) {
	echo elgg_view_module("aside", "", elgg_view("output/longtext", array("value" => $description)));
}