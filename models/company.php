<?php
class Company extends AppModel{
	var $name = 'Company';
	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'company_id',
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