<?php
/* User Fixture generated on: 2012-03-07 02:44:29 : 1331063069 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'usercode' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => '3 ch? cái ??u là mã vi?t t?t c?a công ty. 3 ký t? ti?t theo là stt c?a ng??i ??ng ký trong công ty. vd TYT002', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fullname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'company' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'local_phone' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'usercode_UNIQUE' => array('column' => 'usercode', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'usercode' => 'Lore',
			'email' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'fullname' => 'Lorem ipsum dolor sit amet',
			'company' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'local_phone' => 'Lorem ipsum dolor sit amet'
		),
	);
}
