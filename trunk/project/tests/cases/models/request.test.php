<?php
/* Request Test cases generated on: 2012-03-07 02:43:16 : 1331062996*/
App::import('Model', 'Request');

class RequestTestCase extends CakeTestCase {
	var $fixtures = array('app.request');

	function startTest() {
		$this->Request =& ClassRegistry::init('Request');
	}

	function endTest() {
		unset($this->Request);
		ClassRegistry::flush();
	}

}
