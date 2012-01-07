<?php
/**
 *
 */

echo '<div>';
echo '<label>' . elgg_echo('qa:sniffer:label:component') . ':</label> ';
echo elgg_view('input/dropdown', array(
	'name' => 'component',
	'value' => 'engine',
	'options' => array('engine', 'blog'),
));
echo '</div>';

echo '<div class="elgg-foot">';
echo elgg_view('input/submit', array('value' => elgg_echo('qa:sniffer:label:run')));
echo '</div>';
