<?php
//このモデルはデータベースのLOGSテーブルに参照しています。
class Error extends AppModel {
	var $name = 'Error';
	//LOGSテーブルのフィルドのフォーマトをチェックするために、$validate　を使います。
	var $validate = array(
		'id' => array(
			'q' => array(
				'rule' => array('q'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'q' => array(
				'rule' => array('q'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'userid' => array(
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
}
