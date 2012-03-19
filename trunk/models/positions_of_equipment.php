<?php
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
}
