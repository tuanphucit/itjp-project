<?php 
class Equipment1 extends AppModel{
	var $name = 'Equipment1';
	var $validate = array(
	'code' => array('rule' => 'notEmpty','message' => 'Not null'),
	'name' => array('rule' => 'notEmpty','message' => 'Not null'),
	'description' => array('rule' => 'notEmpty','message' => 'Not null'),	
	'price' => array( 'rule' => 'numeric', 'message' => 'Must be number'),
	'quantity' => array('rule' => 'numeric', 'message' => 'Must be number')
	);
	
	var $hasMany = array(
		'PositionsOfEquipment' => array(
			'className' => 'PositionsOfEquipment',
			'foreignKey' => 'equipmentid',
			'dependent' => true,
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
?>