<?php
/* RequestDetails Test cases generated on: 2012-03-07 02:50:11 : 1331063411*/
App::import('Controller', 'RequestDetails');

class TestRequestDetailsController extends RequestDetailsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RequestDetailsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.request_detail');

	function startTest() {
		$this->RequestDetails =& new TestRequestDetailsController();
		$this->RequestDetails->constructClasses();
	}

	function endTest() {
		unset($this->RequestDetails);
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
