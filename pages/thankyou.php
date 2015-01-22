<?php

// default title
$title_text = elgg_echo("contact:thankyou:title");

// add breadcrumb
elgg_push_breadcrumb(elgg_echo("contact:title"), "contact");
elgg_push_breadcrumb($title_text);

// get page elements
if ($title = elgg_get_plugin_setting("thankyou_title", "contact")) {
	$title_text = $title;
}

$content = elgg_view("contact/thankyou");
$sidebar = elgg_view("contact/sidebar");

// build page
$page_data = elgg_view_layout("content", array(
	"title" => $title_text,
	"content" => $content,
	"sidebar" => $sidebar,
	"filter" => ""
));

// draw page
echo elgg_view_page($title_text, $page_data);