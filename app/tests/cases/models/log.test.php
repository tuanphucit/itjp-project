<?php
/* Log Test cases generated on: 2012-03-07 02:41:39 : 1331062899*/
App::import('Model', 'Log');

class LogTestCase extends CakeTestCase {
	var $fixtures = array('app.log');

	function startTest() {
		$this->Log =& ClassRegistry::init('Log');
	}

	function endTest() {
		unset($this->Log);
		ClassRegistry::flush();
	}

}
