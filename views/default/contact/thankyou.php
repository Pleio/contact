<?php

if ($thankyou_text = elgg_get_plugin_setting("thankyou_text", "contact")) {
	echo elgg_view("output/longtext", array("value" => $thankyou_text));
}

echo "<div class='mtm'>";
echo elgg_view("output/url", array(
	"text" => elgg_echo("contact:thankyou:continue"),
	"href" => elgg_get_site_url(),
	"class" => "elgg-button elgg-button-submit"
));
echo "</div>";