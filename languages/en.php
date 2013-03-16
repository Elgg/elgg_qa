<?php
/**
 * QA English language file
 */

$english = array(
	'admin:develop_tools:sniffer' => 'Code Sniffer',

	'qa:title:sniff' => 'Coding Standard Report',
	'qa:sniffer:instructions' => "This checks code against Elgg's coding standard. The standards are in the documentation directory. Warning: this will take a long time to run for the Elgg engine.",
	'qa:sniffer:title:summary' => 'Summary',
	'qa:sniffer:label:component' => 'Component',
	'qa:sniffer:label:run' => 'Run',
	'qa:sniffer:label:num_files' => 'Number of Files',
	'qa:sniffer:label:num_errors' => 'Number of Errors',
	'qa:sniffer:label:num_warnings' => 'Number of Warnings',
	'qa:sniffer:label:line_num' => 'Line Number',
	'qa:sniffer:label:severity' => 'Severity',
	'qa:sniffer:label:message' => 'Description',

	'qa:error:composer' => "You must run 'composer install' to use the QA plugin. See the README.",
);

add_translation('en', $english);
