<?php

if ($user = elgg_get_logged_in_user_entity()) {
	$name = elgg_get_sticky_value("contact_form", "name", $user->name);
	$email = elgg_get_sticky_value("contact_form", "email", $user->email);
} else {
	$name = elgg_get_sticky_value("contact_form", "name");
	$email = elgg_get_sticky_value("contact_form", "email");
}

$subject = elgg_get_sticky_value("contact_form", "subject");
$message = elgg_get_sticky_value("contact_form", "message");
$cc = elgg_get_sticky_value("contact_form", "cc");

elgg_clear_sticky_form("contact_form");

if ($description = elgg_get_plugin_setting("contact_description", "contact")) {
	echo elgg_view("output/longtext", array("value" => $description));
}

echo "<div>";
echo "<label for='contact_name'>" . elgg_echo("contact:form:name:label") . " *</label>";
echo elgg_view("input/text", array("name" => "name", "rel" => "required", "id" => "contact_name", "value" => $name));
echo "</div>";

echo "<div>";
echo "<label for='contact_email'>" . elgg_echo("contact:form:email:label") . " *</label>";
echo elgg_view("input/email", array("name" => "email", "rel" => "required", "id" => "contact_email", "value" => $email));
echo "</div>";

echo "<div>";
echo "<label for='contact_subject'>" . elgg_echo("contact:form:subject:label") . "</label>";
echo elgg_view("input/email", array("name" => "subject", "id" => "contact_subject", "value" => $subject));
echo "</div>";

echo "<div>";
echo "<label for='contact_message'>" . elgg_echo("contact:form:message:label") . " *</label>";
echo elgg_view("input/longtext", array("name" => "message", "rel" => "required", "id" => "contact_message", "value" => $message));
echo "</div>";

echo "<div>";
echo "<label for='contact_cc' class='hidden'>" . elgg_echo("contact:form:cc:label") . "</label>";
echo elgg_view("input/checkboxes", array("name" => "cc", "id" => "contact_cc", "value" => $cc, "options" => array(elgg_echo("contact:form:cc:label") => 1)));
echo "</div>";

echo elgg_view("input/captcha");

echo "<div class='elgg-foot'>";
echo elgg_view("input/submit", array("value" => elgg_echo("send"), "class" => "elgg-button-submit mbm"));
echo "<div class='elgg-subtext'>" . elgg_echo("contact:form:required_fields:label") . "</div>";
echo "</div>";
