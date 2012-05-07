<?php

//このモデルはデータベースのROOMSテーブルに参照しています。
//データベースを操作する時、モデルを使います。
class Room extends AppModel {

    var $name = 'Room';
    //ROOMSテーブルのフィルドのフォーマトをチェックするために、$validate　を使います。
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
        'typeid' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'quantity_seat' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'renting_fee' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
       // 'image' => array(
         //   'notempty' => array(
           //     'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
           // ),
       // ), 
        'description' => array(
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
    //ROOMTYPES,REQUESTS　テーブルとの関係を定義します。
    var $belongsTo = array(
        'RoomType' => array(
            'className' => 'RoomType',
            'foreignKey' => 'typeid',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
        )
    );
    var $hasMany = array(
        'Request' => array(
            'className' => 'Request',
            'foreignKey' => 'roomid',
            'dependent' => true,
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'PosOfEquip' => array(
            'className' => 'PosOfEquip',
            'foreignKey' => 'roomid',
            'dependent' => true,
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    var $actsAs = array(
    'MeioUpload' => array(
		'image' => array(
            'dir' => 'img{DS}uploads{DS}images',
            'create_directory' => false,
            'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
			'zoomCrop' => true,
            'thumbsizes' => array(
            'normal' => array('width' => 400, 'height' => 300),
),
			'default' => 'default.jpg'
			
          
        )
    )
);

}
