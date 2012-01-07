<?php
/**
 * Quality Assurance plugin for Elgg developers
 */

elgg_register_event_handler('init', 'system', 'qa_init');

function qa_init() {
	elgg_register_admin_menu_item('develop', 'sniffer', 'develop_tools');

	elgg_register_page_handler('qa', 'qa_page_handler');
}

function qa_page_handler($route) {
	elgg_set_context('admin');

	$component = get_input('component', 'engine');
	switch ($component) {
		case 'engine':
			$dir = elgg_get_root_path() . 'engine';
			break;
		default:
			$dir = elgg_get_plugins_path() . $component;
			break;
	}

	$sniffer = new ElggCodeSniffer();
	$sniffer->setDirectory($dir);
	$report = $sniffer->process();

	$content = elgg_view('qa/sniffer/report', array('report' => $report));
	$body = elgg_view_layout('admin', array(
		'content' => $content,
		'title' => elgg_echo('qa:title:sniff'),
	));
	echo elgg_view_page($title, $body, 'admin');

	return true;
}