<?php

//このモデルはデータベースのUSERSテーブルに参照しています。
class User extends AppModel {

    var $name = 'User';
    //USERSテーブルのフィルドを入力する時、フォマートをチェックします。
    var $validate = array(
        'usercode' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => '正しいメール を入力してください',
                'allowEmpty' => false,
                'required' => TRUE,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'メールが存在します。',
            ),
        ),
        'password' => array(
            'minLength' => array(
                'rule' => array('minLength', 6),
                'message' => '字が６個以下',
                'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'fullname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '名前を入力してください',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'company' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => '会社を選択してください',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'phone' => array(
            'notempty' => array(
                'rule' => array('numeric'),
                'message' => '正しい電話番号を入力してください',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'local_phone' => array(
            'notempty' => array(
                'rule' => array('numeric'),
                'message' => '正しい内線番号を入力してください',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    //REQUESTS、COMPANYテーブルとの関係を定義します。
    var $hasMany = array(
        'Request' => array(
            'className' => 'Request',
            'foreignKey' => 'create_by',
            'dependent' => true,
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    var $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'companyid',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
        )
    );

}
