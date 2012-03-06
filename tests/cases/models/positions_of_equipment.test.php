<?php
/* PositionsOfEquipment Test cases generated on: 2012-03-07 02:42:18 : 1331062938*/
App::import('Model', 'PositionsOfEquipment');

class PositionsOfEquipmentTestCase extends CakeTestCase {
	var $fixtures = array('app.positions_of_equipment');

	function startTest() {
		$this->PositionsOfEquipment =& ClassRegistry::init('PositionsOfEquipment');
	}

	function endTest() {
		unset($this->PositionsOfEquipment);
		ClassRegistry::flush();
	}

}
