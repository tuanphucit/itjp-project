<?php
/* PositionsOfEquipments Test cases generated on: 2012-03-07 02:49:26 : 1331063366*/
App::import('Controller', 'PositionsOfEquipments');

class TestPositionsOfEquipmentsController extends PositionsOfEquipmentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PositionsOfEquipmentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.positions_of_equipment');

	function startTest() {
		$this->PositionsOfEquipments =& new TestPositionsOfEquipmentsController();
		$this->PositionsOfEquipments->constructClasses();
	}

	function endTest() {
		unset($this->PositionsOfEquipments);
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
