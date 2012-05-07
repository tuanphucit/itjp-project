<?php
//このモデルはデータベースのREQUESTSテーブルに参照しています。
class Request extends AppModel {

    var $name = 'Request';
    //REQUETSテーブルのフィルドのフォーマトをチェックするために、$validate　を使います。
    var $validate = array(
        'roomid' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'create_by' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'update_by' => array(
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
    //USERS,ROOMS,REQUESTDETAILS　テーブルとの関係を定義します。
    var $belongsTo = array(
        'Requester' => array(
            'className' => 'User',
            'foreignKey' => 'create_by',
            'dependent' => true,
            'conditions' => '',
            'fields' => ''
        ),
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'roomid',
            'dependent' => true,
            'conditions' => '',
            'fields' => ''
        ),
        'Updater' => array(
            'className' => 'User',
            'foreignKey' => 'update_by',
            'dependent' => true,
            'conditions' => '',
            'fields' => ''
        )
    );

}
