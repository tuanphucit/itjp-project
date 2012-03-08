<?php
/* Request Fixture generated on: 2012-03-07 02:43:16 : 1331062996 */
class RequestFixture extends CakeTestFixture {
	var $name = 'Request';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'roomid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'create_by' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'index', 'comment' => 'Ng??i t?o'),
		'create_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'comment' => 'Th?i ?i?m t?o'),
		'note' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'update_by' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'update_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_requests_users' => array('column' => 'create_by', 'unique' => 0), 'fk_requests_users1' => array('column' => 'update_by', 'unique' => 0), 'fk_requests_rooms1' => array('column' => 'roomid', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'roomid' => 1,
			'create_by' => 1,
			'create_time' => '2012-03-07 02:43:16',
			'note' => 'Lorem ipsum dolor sit amet',
			'update_by' => 1,
			'update_time' => '2012-03-07 02:43:16'
		),
	);
}
