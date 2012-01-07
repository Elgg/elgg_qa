<?php
/**
 * Code sniffer report on a single file
 *
 * @uses $vars['filename'] Filename
 * @uses $vars['messages'] List of errors and warnings
 */

$filename = $vars['filename'];
$messages = $vars['messages'];

$line_num_label = elgg_echo('qa:sniffer:label:line_num');
$severity_label = elgg_echo('qa:sniffer:label:severity');
$message_label = elgg_echo('qa:sniffer:label:message');

echo "<h3>$filename</h3>";

echo '<table class="elgg-table mts mbm">';
echo "<tr><th>$line_num_label</th><th>$severity_label</th><th>$message_label</th></tr>";
foreach ($messages as $message) {
	echo '<tr>';
	echo '<td>' . $message['line'] . '</td>';
	echo '<td>' . elgg_echo($message['type']) . '</td>';
	echo '<td>' . $message['message'] . '</td>';
	echo '</tr>';
}
echo '</table>';
