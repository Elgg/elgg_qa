<?php
/**
 * Code sniffer report
 *
 * @uses $vars['report']
 */

echo elgg_view('qa/sniffer/summary', $vars);

foreach ($vars['report']['files'] as $filename => $messages) {
	if (count($messages)) {
		echo elgg_view('qa/sniffer/file', array(
			'filename' => $filename,
			'messages' => $messages,
		));
	}
}
