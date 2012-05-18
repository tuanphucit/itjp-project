<?php

class Phat extends AppModel {

    var $name = 'Phat';
    var $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'userid',
            //'dependent' => true,
            //'conditions' => '',
            //'fields' => '',
        )
    );

}