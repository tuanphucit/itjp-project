<?php
/* RoomType Test cases generated on: 2012-03-07 02:43:37 : 1331063017*/
App::import('Model', 'RoomType');

class RoomTypeTestCase extends CakeTestCase {
	var $fixtures = array('app.room_type');

	function startTest() {
		$this->RoomType =& ClassRegistry::init('RoomType');
	}

	function endTest() {
		unset($this->RoomType);
		ClassRegistry::flush();
	}

}
