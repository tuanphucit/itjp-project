<?php
/* RequestDetail Fixture generated on: 2012-03-07 02:42:51 : 1331062971 */
class RequestDetailFixture extends CakeTestFixture {
	var $name = 'RequestDetail';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'requestid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'begin_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'end_time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'price' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_request_details_requests1' => array('column' => 'requestid', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'requestid' => 1,
			'begin_time' => '2012-03-07 02:42:51',
			'end_time' => '2012-03-07 02:42:51',
			'price' => 1
		),
	);
}
