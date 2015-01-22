<?php

$title_text = elgg_echo("contact:title");

// make breadcrumb
elgg_push_breadcrumb($title_text);

// prepare form
$form_vars = array(
	"id" => "contact_form",
	"class" => "elgg-form-alt"
);
$content = elgg_view_form("contact/send", $form_vars);

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