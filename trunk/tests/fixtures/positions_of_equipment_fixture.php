<?php
/* PositionsOfEquipment Fixture generated on: 2012-03-07 02:42:18 : 1331062938 */
class PositionsOfEquipmentFixture extends CakeTestFixture {
	var $name = 'PositionsOfEquipment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'roomid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'equipmentid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'move_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'note' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_positions_of_equipments_rooms1' => array('column' => 'roomid', 'unique' => 0), 'fk_positions_of_equipments_equipments1' => array('column' => 'equipmentid', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'roomid' => 1,
			'equipmentid' => 1,
			'quantity' => 1,
			'move_time' => '2012-03-07 02:42:18',
			'note' => 'Lorem ipsum dolor sit amet'
		),
	);
}
