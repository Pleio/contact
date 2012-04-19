<?php 

$plugin = $vars["entity"]; 

$wg_contact_options = array('no' => elgg_echo('option:no'), 'yes' => elgg_echo('option:yes'));

?>
<div>
	<label><?php echo elgg_echo("contact:settings:recipient:label"); ?></label><br />
	<?php echo elgg_view("input/text", array("name" => "params[recipient]", "value" => $plugin->recipient)); ?>
</div>

<div>
	<label><?php echo elgg_echo("contact:settings:contact_description:label"); ?></label><br />
	<?php echo elgg_view("input/longtext", array("name" => "params[contact_description]", "value" => $plugin->contact_description)); ?>
</div>

<div>
	<label><?php echo elgg_echo("contact:settings:contact_sidebar_description:label"); ?></label><br />
	<?php echo elgg_view("input/longtext", array("name" => "params[contact_sidebar_description]", "value" => $plugin->contact_sidebar_description)); ?>
</div>

<div>
	<label><?php echo elgg_echo("contact:settings:thankyou_title:label"); ?></label><br />
	<?php echo elgg_view("input/text", array("name" => "params[thankyou_title]", "value" => $plugin->thankyou_title)); ?>
</div>

<div>
	<label><?php echo elgg_echo("contact:settings:thankyou_text:label"); ?></label><br />
	<?php echo elgg_view("input/longtext", array("name" => "params[thankyou_text]", "value" => $plugin->thankyou_text)); ?>
</div>

<div>
	<label><?php echo elgg_echo('contact:settings:wg_contact:label'); ?></label><br />
	<?php echo elgg_view('input/dropdown', array('name' => 'params[wg_contact]', 'options_values' => $wg_contact_options, 'value' => $plugin->wg_contact)); ?>
</div>