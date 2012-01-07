<?php
/**
 * Checking coding standards
 */

echo elgg_view('output/longtext', array('value' => elgg_echo('qa:sniffer:instructions')));

echo elgg_view_form('qa/sniffer', array(
	'method' => 'get',
	'action' => 'qa/sniffer',
	'disable_security' => true,
));
