<?php 
	$title = $vars["title"];
	$message = nl2br($vars["message"]);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<base target="_blank" />
		
		<?php 
			if(!empty($title)){ 
				echo "<title>" . $title . "</title>\n";
			}
		?>
	</head>
	<body>
		<style type="text/css">
			body {
				font: 80%/1.4 Helvetica,Arial,Verdana,sans-serif;
				color: #333333;				
			}
			
			a {
				color: #090970;
			}
			
			#notification_container {
				padding: 20px 0;
				width: 600px;
				margin: 0 auto;
			}
		
			#notification_header {
				text-align: left;
				padding: 0 0 10px;
			}
			
			#notification_header a {
				text-decoration: none;
				font-weight: bold;
				color: #0054A7;
				font-size: 1.5em;
			} 
		
			#notification_wrapper {
				padding: 10px;
				border: 1px solid #ECECEC;
			}
			
			#notification_wrapper h2 {
				margin: 5px 0 5px 10px;
				color: #090970;
				font-size: 1.35em;
				line-height: 2.2em;
			}
			
			#notification_content {
				background: #FFFFFF;
				padding: 10px;
			}
			
			#notification_footer {
				
				margin: 10px 0 0;
				background: #151515;
				padding: 10px;
				text-align: right;
				color: #676767;
			}
			
			#notification_footer a {
				color: #676767;
			}
			
			#notification_footer_logo {
				float: left;
			}
			
			#notification_footer_logo img {
				border: none;
			}
			
			.clearfloat {
				clear:both;
				height:0;
				font-size: 1px;
				line-height: 0px;
			}
			
		</style>
	
		<div id="notification_container">
			<div id="notification_header">
				<?php 
					$site_logo = '<img src="' . $vars['config']->site->url . '/mod/theme_milkgroep/graphics/milk_logo.jpg">';
					$site_url = elgg_view("output/url", array("href" => $vars["config"]->site->url, "text" => $site_logo));
					echo $site_url;
				?>
			</div>
			<div id="notification_wrapper">
				<?php 
				if(!empty($title))
				{?>
					<img src="<?php echo $vars['config']->site->url; ?>/mod/theme_milkgroep/graphics/mail_head_border.png" />
						<?php echo elgg_view_title($title); ?>
					<img src="<?php echo $vars['config']->site->url; ?>/mod/theme_milkgroep/graphics/mail_head_border.png" />
					<?php 
				}
				?>
			
				<div id="notification_content">
					<?php echo $message; ?>
				</div>
				
				<img src="<?php echo $vars['config']->site->url; ?>/mod/theme_milkgroep/graphics/mail_head_border.png" />
			</div>
			
			<div id="notification_footer">
				<?php 
					if(elgg_is_logged_in()){
						$settings_url = $vars["url"] . "settings";
						if(elgg_is_active_plugin("notifications")){
							$settings_url = $vars["url"] . "notifications/personal";
						}
						echo elgg_echo("html_email_handler:notification:footer:settings", array("<a href='" . $settings_url . "'>", "</a>"));
					}
				?>
				<div class="clearfloat"></div>
			</div>
		</div>
	</body>
</html>