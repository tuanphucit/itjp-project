<?php
/* Requests Test cases generated on: 2012-03-07 02:50:42 : 1331063442*/
App::import('Controller', 'Requests');

class TestRequestsController extends RequestsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RequestsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.request');

	function startTest() {
		$this->Requests =& new TestRequestsController();
		$this->Requests->constructClasses();
	}

	function endTest() {
		unset($this->Requests);
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
