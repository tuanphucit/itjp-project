<?php
/* Room Fixture generated on: 2012-03-07 02:44:02 : 1331063042 */
class RoomFixture extends CakeTestFixture {
	var $name = 'Room';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'typeid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'quantity_seat' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'S? gh?'),
		'renting_fee' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'Giá thuê'),
		'image' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_rooms_room_types1' => array('column' => 'typeid', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'typeid' => 1,
			'quantity_seat' => 1,
			'renting_fee' => 1,
			'image' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
