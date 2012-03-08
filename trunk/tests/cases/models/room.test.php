<?php
/* Room Test cases generated on: 2012-03-07 02:44:02 : 1331063042*/
App::import('Model', 'Room');

class RoomTestCase extends CakeTestCase {
	var $fixtures = array('app.room');

	function startTest() {
		$this->Room =& ClassRegistry::init('Room');
	}

	function endTest() {
		unset($this->Room);
		ClassRegistry::flush();
	}

}
