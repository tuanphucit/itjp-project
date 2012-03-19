<?php 
class Equipment1 extends AppModel{
	var $name = 'Equipment1';
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