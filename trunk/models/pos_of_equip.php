<?php

//このモデルはデータベースのPOSITIONOFEQUIPMENTSテーブルに参照しています。
class PosOfEquip extends AppModel {

    var $name = 'PosOfEquip';
    var $belongsTo = array(
        'Equip' => array(
            'className' => 'Equip',
            'foreignKey' => 'equipmentid',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
        ),
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'roomid',
            'dependent' => true,
            'conditions' => '',
            'fields' => ''
        )
    );
    var $validate = array(
        'roomid' => array('rule' => 'numeric', 'message' => 'Must be number'),
        'requipmentid' => array('rule' => 'numeric', 'message' => 'Must be number'),
        'quantity' => array('rule' => 'numeric', 'message' => 'Must be number')
    );

}
