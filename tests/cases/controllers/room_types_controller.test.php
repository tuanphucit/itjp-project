<?php
/* RoomTypes Test cases generated on: 2012-03-07 02:51:04 : 1331063464*/
App::import('Controller', 'RoomTypes');

class TestRoomTypesController extends RoomTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RoomTypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.room_type');

	function startTest() {
		$this->RoomTypes =& new TestRoomTypesController();
		$this->RoomTypes->constructClasses();
	}

	function endTest() {
		unset($this->RoomTypes);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
