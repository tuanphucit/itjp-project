<?php
/* Rooms Test cases generated on: 2012-03-07 02:51:39 : 1331063499*/
App::import('Controller', 'Rooms');

class TestRoomsController extends RoomsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RoomsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.room');

	function startTest() {
		$this->Rooms =& new TestRoomsController();
		$this->Rooms->constructClasses();
	}

	function endTest() {
		unset($this->Rooms);
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
