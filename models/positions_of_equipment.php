<?php

//このモデルはデータベースのPOSITIONOFEQUIPMENTSテーブルに参照しています。
class PositionsOfEquipment extends AppModel {
	var $name = 'PositionsOfEquipment';
	var $belongsTo = array(
		'Equipment1' => array(
			'className' => 'Equipment1',
			'foreignKey'=> 'equipmentid',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
	)
	);
	var $validate = array(
	'roomid' => array('rule' => 'numeric', 'message' => 'Must be number'),
	'requipmentid' => array('rule' => 'numeric', 'message' => 'Must be number'),
	'quantity' => array('rule' => 'numeric', 'message' => 'Must be number')
	);
}
