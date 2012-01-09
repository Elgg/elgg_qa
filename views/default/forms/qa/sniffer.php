<?php
/**
 * Select options for code sniffing
 */

$plugins = elgg_get_plugins('all');
$reducer = function($plugin) {
	return $plugin->getID();
};
$options = array_map($reducer, $plugins);
sort($options);

array_unshift($options, 'engine');

echo '<div>';
echo '<label>' . elgg_echo('qa:sniffer:label:component') . ':</label> ';
echo elgg_view('input/dropdown', array(
	'name' => 'component',
	'value' => 'engine',
	'options' => $options,
));
echo '</div>';

echo '<div class="elgg-foot">';
echo elgg_view('input/submit', array('value' => elgg_echo('qa:sniffer:label:run')));
echo '</div>';
