<?php

/**
 * Class PhileDraft
 */
class PhileDraft extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {
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
				$fileName = strtolower($payload->name) . CONTENT_EXT;
				@file_put_contents(CONTENT_DIR . $fileName, $payload->content);
			}
			exit;
		}
	}
}
