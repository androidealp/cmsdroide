<<<<<<< HEAD:vendor/mihaildev/yii2-elfinder/php/plugins/Sanitizer/plugin.php
<?php
/**
 * elFinder Plugin Sanitizer
 *
 * Sanitizer of file-name and file-path etc.
 *
 * ex. binding, configure on connector options
 *	$opts = array(
 *		'bind' => array(
 *			'mkdir.pre mkfile.pre rename.pre' => array(
 *				'Plugin.Sanitizer.cmdPreprocess'
 *			),
 *			'upload.presave' => array(
 *				'Plugin.Sanitizer.onUpLoadPreSave'
 *			)
 *		),
 *		// global configure (optional)
 *		'plugin' => array(
 *			'Sanitizer' => array(
 *				'enable' => true,
 *				'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
 *				'replace'  => '_'    // replace to this
 *			)
 *		),
 *		// each volume configure (optional)
 *		'roots' => array(
 *			array(
 *				'driver' => 'LocalFileSystem',
 *				'path'   => '/path/to/files/',
 *				'URL'    => 'http://localhost/to/files/'
 *				'plugin' => array(
 *					'Sanitizer' => array(
 *						'enable' => true,
 *						'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
 *						'replace'  => '_'    // replace to this
 *					)
 *				)
 *			)
 *		)
 *	);
 *
 * @package elfinder
 * @author Naoki Sawada
 * @license New BSD
 */
class elFinderPluginSanitizer
{
	private $opts = array();
	
	public function __construct($opts) {
		$defaults = array(
			'enable'   => true,  // For control by volume driver
			'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
			'replace'  => '_'    // replace to this
		);
	
		$this->opts = array_merge($defaults, $opts);
	}
	
	public function cmdPreprocess($cmd, &$args, $elfinder, $volume) {
		$opts = $this->getOpts($volume);
		if (! $opts['enable']) {
			return false;
		}
	
		if (isset($args['name'])) {
			$args['name'] = $this->sanitizeFileName($args['name'], $opts);
		}
		return true;
	}

	public function onUpLoadPreSave(&$path, &$name, $src, $elfinder, $volume) {
		$opts = $this->getOpts($volume);
		if (! $opts['enable']) {
			return false;
		}
	
		if ($path) {
			$path = $this->sanitizeFileName($path, $opts, array('/'));
		}
		$name = $this->sanitizeFileName($name, $opts);
		return true;
	}
	
	private function getOpts($volume) {
		$opts = $this->opts;
		if (is_object($volume)) {
			$volOpts = $volume->getOptionsPlugin('Sanitizer');
			if (is_array($volOpts)) {
				$opts = array_merge($this->opts, $volOpts);
			}
		}
		return $opts;
	}
	
	private function sanitizeFileName($filename, $opts, $allows = array()) {
		$targets = $allows? array_diff($opts['targets'], $allows) : $opts['targets'];
		return str_replace($targets, $opts['replace'], $filename);
  	}
}
=======
<?php
/**
 * elFinder Plugin Sanitizer
 *
 * Sanitizer of file-name and file-path etc.
 *
 * ex. binding, configure on connector options
 *	$opts = array(
 *		'bind' => array(
 *			'upload.pre mkdir.pre mkfile.pre rename.pre archive.pre ls.pre' => array(
 *				'Plugin.Sanitizer.cmdPreprocess'
 *			),
 *			'ls' => array(
 *				'Plugin.Sanitizer.cmdPostprocess'
 *			),
 *			'upload.presave' => array(
 *				'Plugin.Sanitizer.onUpLoadPreSave'
 *			)
 *		),
 *		// global configure (optional)
 *		'plugin' => array(
 *			'Sanitizer' => array(
 *				'enable' => true,
 *				'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
 *				'replace'  => '_'    // replace to this
 *			)
 *		),
 *		// each volume configure (optional)
 *		'roots' => array(
 *			array(
 *				'driver' => 'LocalFileSystem',
 *				'path'   => '/path/to/files/',
 *				'URL'    => 'http://localhost/to/files/'
 *				'plugin' => array(
 *					'Sanitizer' => array(
 *						'enable' => true,
 *						'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
 *						'replace'  => '_'    // replace to this
 *					)
 *				)
 *			)
 *		)
 *	);
 *
 * @package elfinder
 * @author Naoki Sawada
 * @license New BSD
 */
class elFinderPluginSanitizer
{
	private $opts = array();
	private $replaced = array();
	private $keyMap = array(
		'ls' => 'intersect',
		'upload' => 'renames'
	);

	public function __construct($opts) {
		$defaults = array(
			'enable'   => true,  // For control by volume driver
			'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
			'replace'  => '_'    // replace to this
		);
	
		$this->opts = array_merge($defaults, $opts);
	}
	
	public function cmdPreprocess($cmd, &$args, $elfinder, $volume) {
		$opts = $this->getOpts($volume);
		if (! $opts['enable']) {
			return false;
		}
		$this->replaced[$cmd] = array();
		$key = (isset($this->keyMap[$cmd]))? $this->keyMap[$cmd] : 'name';
		
		if (isset($args[$key])) {
			if (is_array($args[$key])) {
				foreach($args[$key] as $i => $name) {
					$this->replaced[$cmd][$name] = $args[$key][$i] = $this->sanitizeFileName($name, $opts);
				}
			} else {
				$name = $args[$key];
				$this->replaced[$cmd][$name] = $args[$key] = $this->sanitizeFileName($name, $opts);
			}
		}
		return true;
	}
	
	public function cmdPostprocess($cmd, &$result, $args, $elfinder) {
		if ($cmd === 'ls') {
			if (! empty($result['list']) && ! empty($this->replaced['ls'])) {
				foreach($result['list'] as $hash => $name) {
					if ($keys = array_keys($this->replaced['ls'], $name)) {
						if (count($keys) === 1) {
							$result['list'][$hash] = $keys[0];
						} else {
							$result['list'][$hash] = $keys;
						}
					}
				}
			}
		}
	}
	
	public function onUpLoadPreSave(&$path, &$name, $src, $elfinder, $volume) {
		$opts = $this->getOpts($volume);
		if (! $opts['enable']) {
			return false;
		}
	
		if ($path) {
			$path = $this->sanitizeFileName($path, $opts, array('/'));
		}
		$name = $this->sanitizeFileName($name, $opts);
		return true;
	}
	
	private function getOpts($volume) {
		$opts = $this->opts;
		if (is_object($volume)) {
			$volOpts = $volume->getOptionsPlugin('Sanitizer');
			if (is_array($volOpts)) {
				$opts = array_merge($this->opts, $volOpts);
			}
		}
		return $opts;
	}
	
	private function sanitizeFileName($filename, $opts, $allows = array()) {
		$targets = $allows? array_diff($opts['targets'], $allows) : $opts['targets'];
		return str_replace($targets, $opts['replace'], $filename);
  	}
}
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535:vendor/studio-42/elfinder/php/plugins/Sanitizer/plugin.php
