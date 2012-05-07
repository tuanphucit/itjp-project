<?php

//このモデルはデータベースのROOMTYPESテーブルに参照しています。
class RoomType extends AppModel {

    var $name = 'RoomType';
    //ROOMTYPESテーブルのフィルドのフォーマトをチェックするために、$validate　を使います。
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //ROOMS　テーブルとの関係を定義します。
    var $hasMany = array(
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'typeid',
            'dependent' => true,
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
