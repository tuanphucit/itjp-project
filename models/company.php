<?php

//このモデルはデータベースのCOMPANIESテーブルに参照しています。
class Company extends AppModel {

    var $name = 'Company';
    //USERSテーブルとの関係を定義します。
    var $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'companyid',
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