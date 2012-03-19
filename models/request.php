<?php
class Request extends AppModel {
	var $name = 'Request';
	var $validate = array(
		'roomid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'create_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'update_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey'=> 'create_by',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
		)
	);
	var $hasMany = array(
		'RequestDetail' => array(
			'className' => 'RequestDetail',
			'foreignKey' => 'requestid',
			'dependent' => true,
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
