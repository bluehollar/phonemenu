<?php

// @start snippet
/* Define Menu */
$web = array();
$web['default'] = array('kalen','rich', 'billing', 'support');

/* Get the menu node, index, and url */
$node = $_REQUEST['node'];
$index = (int) $_REQUEST['Digits'];
$url = 'http://'.dirname($_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF']).'/phonemenu.php';

/* Check to make sure index is valid */
if(isset($web[$node]) || count($web[$node]) >= $index && !is_null($_REQUEST['Digits']))
	$destination = $web[$node][$index];
else
	$destination = NULL;
// @end snippet

// @start snippet
/* Render TwiML */
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?><Response>\n";
switch($destination) {
	case 'kalen': ?>
		<Say>Please wait while we connect you to kalen barker</Say>
		<Dial timeout="10" record="false">913-777-6930</Dial>
		<?php break;
	case 'rich': ?>
		<Say>Please wait while we connect you to rich friedmann</Say>
		<Dial timeout="10" record="false">913-777-6930</Dial>
		<?php break;
	case 'billing': ?>
		<Say>Please wait while we connect you to a bluehollar service manager</Say>
		<Dial timeout="10" record="false">913-890-3988</Dial>
		<?php break;
	case 'support': ?>
		<Say>Please wait while we connect you to techincal support for our web application</Say>
		<Dial timeout="10" record="false">913-890-3351</Dial>
		<?php break;
		<Gather action="<?php echo 'http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonemenu.php?node=default'; ?>" numDigits="1">
			<Say>Hello and thanks for calling bluehollar</Say>
			<Say>to speak with kalen, press 1</Say>
			<Say>to speak with rich, press 2</Say>
			<Say>if you have a question about an invoice, press 3</Say>
			<Say>if you are a contractor and are having a techincal problem submitting a bid, press 4</Say>
		</Gather>
		<?php
		break;
}
// @end snippet

?>

</Response>
