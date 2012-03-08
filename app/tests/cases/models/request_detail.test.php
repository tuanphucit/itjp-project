<?php
/* RequestDetail Test cases generated on: 2012-03-07 02:42:51 : 1331062971*/
App::import('Model', 'RequestDetail');

class RequestDetailTestCase extends CakeTestCase {
	var $fixtures = array('app.request_detail');

	function startTest() {
		$this->RequestDetail =& ClassRegistry::init('RequestDetail');
	}

	function endTest() {
		unset($this->RequestDetail);
		ClassRegistry::flush();
	}

}
