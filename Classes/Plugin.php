<?php
/**
 * Plugin class
 */
namespace Phile\Plugin\Herbdool\PhileDraft;

/**
 * Class Plugin
 *
 * @author Herb v/d Dool
 * @link http://github.com/herbdool/philedraft
 * @license http://opensource.org/licenses/MIT
 * @package Phile\Plugin\Phile\PhileDraft
 * 
 * From Zvonko Biškup's pico_draft plugin
 * https://github.com/codeforest/pico_draft
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
	public function __construct() {
		\Phile\Event::registerEvent('request_uri', $this);
	}

	public function on($eventKey, $data = null) {
    	// If the request_uri matches then it's content coming from Draft
		if (($eventKey == 'request_uri') && ($this->settings['draft_url'] == $data['uri'])) {
			// Getting the payload, decoding it and saving to file system inside content dir
			if ($_POST['payload']) {
				// We have a request from Draft, let's save it to file
				$payload = json_decode($_POST['payload']);
				$name = strtolower($payload->name);
                                $name = str_replace(" ","-",$name);
                                $fileName = $name . CONTENT_EXT;
				@file_put_contents(CONTENT_DIR . $this->settings['publish_dir'] . "/" . $fileName, $payload->content);
			}
			exit;
		}
	}
}
