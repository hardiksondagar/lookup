<?php

error_reporting(E_ALL ^ E_NOTICE);

/*

WHOIS Lookup Script - free version

Version 1.0 May 1st 2014

COPYRIGHT whoislookupscript.com 2014

This is the free version of WHOIS Lookup Script.  You may use it on any number of websites and you may freely distribute it.  You may not sell it.  You may not remove any of the copyright notices.  A condition of using the free script is that you may not remove the "Powered by WHOIS Lookup Script" link on the lookup form.

For support please visit: http://whoislookupscript.com/support/

PRO VERSION
-----------

You can get a pro version of the script which has these features:

	* Support for over 1,000 domain extensions
	* Affiliate link to GoDaddy to register available names
	* Support for Adsense/Godaddy banner
	* Single or multiple lookups
	* Optional CAPTCHA
	* Protection against bots
	* No branding

You can get the pro version here: http://whoislookupscript.com/

See a demo of the pro version here: http://whoislookupscript.com/demo_pro_script.php

MINIMUM REQUIREMENTS
--------------------

PHP 4 or PHP 5

DESCRIPTION
-----------

This is a web-based PHP script offering a domain name WHOIS lookup service to website visitors.

The script supports the most popular domain extensions.
 
The script queries WHOIS servers directly.  The server response is parsed to see if a domain name is registered or not and the response is shown on the screen.

SETUP INSTRUCTIONS
------------------

The script will work perfectly well as it is with the default configuration.  You can simply upload it to your webspace and call it up in a browser.  It is recommended that you do this initially to make sure that it's working.

Otherwise:

Step 1: Configure the script.
Step 2: Upload the script to your webspace.

Step 1:
-------

Configure the script.

Configure the script using the configuration options below.  If you're not sure about an option, leave it as it is.

Step 2:
-------

Upload the script to your webspace.

When you have finished configuring the script, save it and upload it to your webspace.  You can call the script by any name, default is "whoislookupscript.php".  When you have uploaded it to your webspace, you can call it up in a browser like so:

http://www.example.com/whoislookupscript.php

You can upload the script to any directory/folder on your website, it doesn't have to be in the root like the example above.

###############################
#                             #
#                             #
#    CONFIGURATION OPTIONS    #
#                             #
#                             #
###############################

You may configure the script by editing the values below.

Connection timeout.  This is the maximum length of time, in seconds, to wait for a response from a WHOIS server.  To change it, just change the number like this example: $connection_timeout = 10;  Default: $connection_timeout = 5;

*/

$connection_timeout = 5;

/*

Default extension.  If a default extension is configured, the lookup form will show that extension already selected.  Enter one extension between the quotes.  Example: $default_extension = ".com.au";  Default: $default_extension = "";

*/

$default_extension = "";

/*

Title.  A title is shown in the header area of the lookup form.  You may enter a title between the quotes below.  Default: $header_title = "WHOIS Lookup";

*/

$header_title = "WHOIS Lookup";

/*

Header title URL.  The title in the header of the form page is also a link.  By default it links back to the default form but you can make it link anywhere, for example: $header_title_url = "http://example.com";  Default: $header_title_url = $_SERVER["PHP_SELF"];

*/

$header_title_url = $_SERVER["PHP_SELF"];

/*

Use internal style sheet.  The script has an internal style sheet which you may use for styling the form and the WHOIS server response display, etc.  Enabled by default.  To disable it, change the 1 to 0 like: $internal_style_sheet = 0;  Default: $internal_style_sheet = 1;

*/

$internal_style_sheet = 1;

/*

Use external style sheet.  You may choose to use an external style sheet.  To do so, change the 0 to 1, like: $external_style_sheet = 1;  Default: $external_style_sheet = 0;

*/

$external_style_sheet = 0;

/*

External style sheet location.  If you have enabled $external_style_sheet above, you need to provide the location of the external style sheet here.  Can be relative or absolute.  Enter the location between the quotes below.  Default: $external_style_sheet_location = "/style.css";

*/

$external_style_sheet_location = "/style.css";

/*

Internal style sheet values.  You may configure the internal style sheet values below.  All the values are in quotes.

Default:

$body_font_family = "verdana,arial,sans-serif";
$body_font_size = "80%";
$body_background = "#d4d4d4";
$body_color = "#000000";
$body_padding = "0";
$body_border = "0";
$body_margin = "20px";

$hr_background = "#d4d4d4";
$hr_color = "#d4d4d4";

$link_text_decoration = "underline";
$link_color = "#0000ff";
$link_background = "#ffffff";

$link_hover_text_decoration = "underline";
$link_hover_color = "#0000ff";
$link_hover_background = "#ffffff";

$link_visited_text_decoration = "underline";
$link_visited_color = "#0000ff";
$link_visited_background = "#ffffff";

$link_active_text_decoration = "underline";
$link_active_color = "#0000ff";
$link_active_background = "#ffffff";

$container_background = "#ffffff";

$title_link_font_size = "25px";
$title_link_color = "#000000";
$title_link_text_decoration = "none";
$title_link_background = "#ffffff";

$error_messages_color = "#ff0000";

$form_background = "#f2f2f2";

$form_border = "#d4d4d4";

$response_display_background = "#f2f2f2";

$domain_available_message_color = "#009900";

*/

$body_font_family = "verdana,arial,sans-serif";
$body_font_size = "80%";
$body_background = "#d4d4d4";
$body_color = "#000000";
$body_padding = "0";
$body_border = "0";
$body_margin = "20px";

$hr_background = "#d4d4d4";
$hr_color = "#d4d4d4";

$link_text_decoration = "underline";
$link_color = "#0000ff";
$link_background = "#ffffff";

$link_hover_text_decoration = "underline";
$link_hover_color = "#0000ff";
$link_hover_background = "#ffffff";

$link_visited_text_decoration = "underline";
$link_visited_color = "#0000ff";
$link_visited_background = "#ffffff";

$link_active_text_decoration = "underline";
$link_active_color = "#0000ff";
$link_active_background = "#ffffff";

$container_background = "#ffffff";

$title_link_font_size = "25px";
$title_link_color = "#000000";
$title_link_text_decoration = "none";
$title_link_background = "#ffffff";

$error_messages_color = "#ff0000";

$form_background = "#f2f2f2";

$form_border = "#d4d4d4";

$response_display_background = "#f2f2f2";

$domain_available_message_color = "#009900";

####################################################
#                                                  #
#                                                  #
#           END OF CONFIGURATION OPTIONS           #
#    No need to change anything below this line    #
#                                                  #
#                                                  #
####################################################

$supported_extensions = array
(

	".com" => array("whois_server" => "whois.verisign-grs.com"),
	".net" => array("whois_server" => "whois.verisign-grs.com"),
	".org" => array("whois_server" => "whois.publicinterestregistry.net"),
	".info" => array("whois_server" => "whois.afilias.info"),
	".biz" => array("whois_server" => "whois.biz"),
	".co.uk" => array("whois_server" => "whois.nic.uk"),
	".ca" => array("whois_server" => "whois.cira.ca"),
	".com.au" => array("whois_server" => "whois.audns.net.au")

	);

$extensions_array = array_keys($supported_extensions);

if($_SERVER['REQUEST_METHOD'] == "POST")
{

// Trim post values and make lower-case.

	foreach($_POST as $key => $value){$_POST[$key] = strtolower(trim($value));}

// Check submitted values.

	$errors = array();

// Check domain and extension are present and have values.

	if(!isset($_POST['domain']) || empty($_POST['domain']) || !isset($_POST['extension']) || empty($_POST['extension'])){$errors[] = "Please enter a domain name.";}

// Check domain.

	if(isset($_POST['domain']) && !empty($_POST['domain']))
	{

// Remove spaces.

		$_POST['domain'] = str_replace(" ","",$_POST['domain']);

// Check length of domain.

		if(strlen($_POST['domain']) > 63){$errors[] = "Domain is too long.  Max 63 characters.";}

// Check domain for acceptable characters.

		if(!preg_match('/^[0-9a-zA-Z-]+$/i',$_POST['domain'])){$errors[] = "Domain may only contain numbers, letters or hyphens.";}

// Check domain doesn't begin or end with a hyphen.

		if(substr(stripslashes($_POST['domain']),0,1) == "-" || substr(stripslashes($_POST['domain']),-1) == "-"){$errors[] = "Domain may not begin or end with a hyphen.";}

	}

// Check extension is acceptable.  Extension should be lower case at this point for testing in the case-sensitive in_array().

	if(!in_array($_POST['extension'],$extensions_array)){$errors[] = "Domain extension is not supported.";}

	if(!count($errors))
	{

		$domain = $_POST['domain'];
		$extension = $_POST['extension'];

		$whois_servers = array
		(

			"whois.afilias.info" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "NOT FOUND","match_string" => "Domain Name:","encoding" => "UTF-8"),

			"whois.audns.net.au" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "No Data Found","match_string" => "Domain Name:","encoding" => "UTF-8"),

			"whois.biz" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "Not found:","match_string" => "Registrant Name:","encoding" => "iso-8859-1"),

			"whois.cira.ca" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "Domain status:         available","match_string" => "Domain status:         registered","encoding" => "UTF-8"),

			"whois.nic.uk" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "No match for","encoding" => "iso-8859-1"),

			"whois.publicinterestregistry.net" => array("port" => "43","query_begin" => "","query_end" => "\r\n","redirect" => "0","redirect_string" => "","no_match_string" => "NOT FOUND","encoding" => "iso-8859-1"),

			"whois.verisign-grs.com" => array("port" => "43","query_begin" => "domain ","query_end" => "\r\n","redirect" => "1","redirect_string" => "Whois Server:","no_match_string" => "No match for domain","encoding" => "iso-8859-1")

			);

$whois_server = $supported_extensions[$extension]['whois_server'];
$port = $whois_servers[$whois_server]['port'];
$query_begin = $whois_servers[$whois_server]['query_begin'];
$query_end = $whois_servers[$whois_server]['query_end'];
$whois_redirect_check = $whois_servers[$whois_server]['redirect'];
$whois_redirect_string = $whois_servers[$whois_server]['redirect_string'];
$no_match_string = $whois_servers[$whois_server]['no_match_string'];
$encoding = $whois_servers[$whois_server]['encoding'];

$whois_redirect_server = "";
$response = "";
$line = "";

$fp = fsockopen($whois_server,$port,$errno,$errstr,$connection_timeout);

if(!$fp){print "fsockopen() error when trying to connect to {$whois_server}<br><br>Error number: ".$errno."<br>"."Error message: ".$errstr; exit;}

fputs($fp,$query_begin.$domain.$extension.$query_end);

while(!feof($fp))
{

	$line = fgets($fp);

	$response .= $line;

// Check for whois redirect server.

	if($whois_redirect_check && stristr($line,$whois_redirect_string))
	{

		$whois_redirect_server = trim(str_replace($whois_redirect_string,"",$line));

		break;

	}

}

fclose($fp);

// Query redirect server if set.

if($whois_redirect_server)
{

// Query the redirect server.  Might be different values for port etc, so give the option to change them from those set previously.  Using defaults below.

	$whois_server = $whois_redirect_server;
	$port = "43";
	$connection_timeout = 5;
	$query_begin = "";
	$query_end = "\r\n";

	$response = "";

	$fp = fsockopen($whois_server,$port,$errno,$errstr,$connection_timeout);

	if(!$fp){print "fsockopen() error when trying to connect to {$whois_server}<br><br>Error number: ".$errno."<br>"."Error message: ".$errstr; exit;}

	fputs($fp,$query_begin.$domain.$extension.$query_end);

	while(!feof($fp)){$response .= fgets($fp);}

	fclose($fp);

}

// Check result for no-match phrase.

$domain_registered_message = "";

if(stristr($response,$no_match_string))
{

	$domain_registered_message = "<span style=\"color:#009900\"><b>{$domain}{$extension} is not registered</b></span>";

}
else
{

	$domain_registered_message = "<b>{$domain}{$extension} is registered</b>";

}

}

}

// Set a default encoding for the form page.  If a WHOIS server uses a particular encoding it will be set above if the form is posted without errors.

if(!isset($encoding)){$encoding = "UTF-8";}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php print $encoding ?>">
	<title>WHOIS Lookup</title>
	<meta name="description" content="WHOIS lookup service.">
	<meta name="keywords" content="whois,lookup,domain">
	<?php

// Use internal or external style sheet.

	if($internal_style_sheet)
	{

		print "<style type=\"text/css\">\n";
		print "body{font-family:{$body_font_family}; font-size:{$body_font_size}; background:{$body_background}; color:{$body_color}; padding:{$body_padding}; border:{$body_border}; margin:{$body_margin};}\n";
		print "hr{border:0; height:1px; background:{$hr_background}; color:{$hr_color};}\n";
		print "a:link{text-decoration:{$link_text_decoration}; color:{$link_color}; background:{$link_background};}\n";
		print "a:hover{text-decoration:{$link_hover_text_decoration}; color:{$link_hover_color}; background:{$link_hover_background};}\n";
		print "a:visited{text-decoration:{$link_visited_text_decoration}; color:{$link_visited_color}; background:{$link_visited_background};}\n";
		print "a:active{text-decoration:{$link_active_text_decoration}; color:{$link_active_color}; background:{$link_active_background};}\n";
		print ".container{width:800px; background:{$container_background}; word-wrap:break-word; padding:20px; margin-left:auto; margin-right:auto;}\n";
		print "#title_link{font-size:{$title_link_font_size}; color:{$title_link_color}; text-decoration:{$title_link_text_decoration}; background:{$title_link_background};}\n";
		print ".error_messages{color:{$error_messages_color};}\n";
		print "#lookup_form{display:inline-block; background:{$form_background}; padding:5px; border:1px solid {$form_border};}\n";
		print ".response_display{background:{$response_display_background}; width:600px; padding:10px; word-wrap:break-word;}\n";
		print ".domain_available_message{color:{$domain_available_message_color};}\n";
		print "</style>\n";

	}
	elseif($external_style_sheet)
	{

		print "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$external_style_sheet_location}\">";

	}

	?>
</head>
<body>
	<div class="container">
		<table style="width:100%; border-collapse:collapse;">
			<tr>
				<td style="text-align:left; vertical-align:middle; padding:0px;"><a href="<?php print htmlspecialchars($header_title_url) ?>" id="title_link"><b><?php print $header_title ?></b></a></td>
				<td style="text-align:right; vertical-align:middle; padding:0px;"><div style="width:468px"></div></td>
			</tr>
		</table>
		<br>
		<hr>
		<br>
		<?php

// Print any errors.

		if(isset($errors) && count($errors))
		{

			foreach($errors as $value){print "<span class=\"error_messages\"><b>".stripslashes($value)."</b></span><br>";}

			print "<br>";

		}

		?>
		<form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
			<div id="lookup_form">
				<input type="text" name="domain" value="<?php if(isset($_POST['domain'])){print stripslashes(htmlspecialchars($_POST['domain']));} ?>">
				<select name="extension">
					<?php

					foreach($extensions_array as $value)
					{

						if((isset($_POST['extension']) && $_POST['extension'] == $value) || (!isset($_POST['extension']) && $value == $default_extension))
						{

							print "<option value=\"$value\" selected>{$value}</option>\n";}else{print "<option value=\"$value\">{$value}</option>\n";}

						}

						?>
					</select>
					<input type="submit" value="Perform lookup">
				</div>
			</form>

			<?php

			if(isset($domain_registered_message) && !empty($domain_registered_message)){print "<br>".$domain_registered_message."<br><br>";}

			if(isset($response) && !empty($response))
			{
				echo json_encode($response);

				print "<div class=\"response_display\">Response from the WHOIS server ($whois_server):<br><br>".str_replace("\n","<br>",$response)."</div>";

			}

			if($_SERVER['REQUEST_METHOD'] == "GET")
			{

				?>
				<br>This site offers a WHOIS lookup service which allows you to perform a WHOIS lookup on a domain name to see who owns it or to see if it's available for registration.  This service queries the appropriate WHOIS server for the domain name and displays the response which is a public record that anyone can see.  In some cases, the owner of a domain name (the "registrant") may choose not to have their address and contact information displayed.
				<?php

			}

			?>
			<br><br>Powered by <a href="http://whoislookupscript.com" style="color:#0000ff">WHOIS Lookup Script</a>

		</div>
	</body>
	</html>