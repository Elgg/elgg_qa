<?php
/**
 * Wrapper for PHP_CodeSniffer to support its use from Elgg
 */
class ElggCodeSniffer {

	protected $sniffer = null;
	protected $standard = "";
	protected $files = array();
	protected $ignores = array();

	public function __construct() {
		$this->sniffer = new PHP_CodeSniffer(0, 0, 'utf-8', false);
		$this->standard = dirname(dirname(__FILE__)) . '/vendor/elgg/sniffs/elgg.xml';
		$this->ignores = array(
			'*/tests/*' => 'absolute',
			'*/test/*' => 'absolute',
			'*/upgrades/*' => 'absolute',
			'*/vendors/*' => 'absolute',
			'*/vendor/*' => 'absolute',
			'*/deprecated*' => 'absolute',
			'*/languages/*' => 'absolute',
		);
	}

	/**
	 * Set a directory to be processed
	 *
	 * @param string $directory The full path to the directory to process
	 */
	public function setDirectory($directory) {
		$this->files[] = $directory;
	}

	/**
	 * Run the code sniffer
	 *
	 * @return array Report organized by file
	 */
	public function process() {
		if ($this->sniffer == null) {
			return array();
		}

		set_time_limit(0);

		$this->sniffer->setIgnorePatterns($this->ignores);

		$this->sniffer->process($this->files, $this->standard);
		return $this->prepareReport($this->sniffer->getFilesErrors());
	}

	/**
	 * Format the PHP_CodeSniffer data for public consumption
	 *
	 * @param array $data Multi-dimensional array with all the warnings and failures
	 * @return array
	 */
	protected function prepareReport($data) {
		$report = array(
			'num_files' => count($data),
			'num_errors' => 0,
			'num_warnings' => 0,
			'files' => array(),
		);

		foreach ($data as $filename => $info) {
			$report['num_errors'] += $info['numErrors'];
			$report['num_warnings'] += $info['numWarnings'];

			$messages = array();
			foreach (array('errors', 'warnings') as $type) {
				$name = ($type == 'errors') ? 'error' : 'warning';
				foreach ($info[$type] as $line => $lineInfo) {
					foreach ($lineInfo as $columnInfo) {
						foreach ($columnInfo as $message) {
							$message['type'] = $name;
							$message['line'] = $line;
							$messages[] = $message;
						}
					}
				}
			}
			$report['files'][$filename] = $messages;
		}

		return $report;
	}
}
