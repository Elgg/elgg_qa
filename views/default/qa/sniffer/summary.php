<?php
/**
 * Summary of the code sniffer report
 */

$num_files = $vars['report']['num_files'];
$num_errors = $vars['report']['num_errors'];
$num_warnings = $vars['report']['num_warnings'];

$num_files_label = elgg_echo('qa:sniffer:label:num_files');
$num_errors_label = elgg_echo('qa:sniffer:label:num_errors');
$num_warnings_label = elgg_echo('qa:sniffer:label:num_warnings');

echo '<h3>' . elgg_echo('qa:sniffer:title:summary') . '</h3>';

echo <<<SUMMARY
<table class="elgg-table mts mbl">
	<tr>
		<th>$num_files_label</th>
		<th>$num_errors_label</th>
		<th>$num_warnings_label</th>
	</tr>
	<tr>
		<td>$num_files</td>
		<td>$num_errors</td>
		<td>$num_warnings</td>
	</tr>
</table>
SUMMARY;
