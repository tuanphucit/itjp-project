<?php
//このモデルはデータベースのREQUESTDETAILSテーブルに参照しています。
class RequestDetail extends AppModel {
	var $name = 'RequestDetail';
	
	//REQUETDETAILSテーブルのフィルドのフォーマトをチェックするために、$validate　を使います。
	var $validate = array(
		'requestid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
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
	//REQUESTS　テーブルとの関係を定義します。
	var $belongsTo = array(
		'Request' => array(
			'className' => 'Request',
			'foreignKey'=> 'requestid',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
		)
	);
}
