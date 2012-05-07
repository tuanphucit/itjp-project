<?php
/* Log Fixture generated on: 2012-03-07 02:41:39 : 1331062899 */
class LogFixture extends CakeTestFixture {
	var $name = 'Log';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => 'utf8_general_ci', 'comment' => 'ký t? ??u là ch? cái : E :error, W:warning, N:noteis. 4 ký t? ti?p theo là ch? s? : VD: E0003', 'charset' => 'utf8'),
		'userid' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'time' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_logs_users1' => array('column' => 'userid', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'code' => 'Lor',
			'userid' => 1,
			'time' => '2012-03-07 02:41:39',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
