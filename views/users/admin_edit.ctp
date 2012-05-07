<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('ユーザ管理', true), '/admin/users');
$html->addCrumb(__('ユーザ編集', true), '/admin/users/edit');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('ユーザ編集') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('リストページへ戻る', true), array('action' => 'admin_index'), array('title' => __('リストページへ戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin edit user
        $stsOptions = array(
            '2' => __('未確認', true),
            '1' => __('アクティブ', true),
            '0' => __('無効化', true)
        );
        $roleOptions = array(
            '1' => __('テナント', true),
            '2' => __('管理者', true)
        );
        echo $form->create('User', array('onsubmit' => "return confirm('" . __('このテナントを本当に変更したいですか？', true) . "')"));
        echo $form->input('fullname', array('label' => __('氏名', true), 'type' => 'text'));
        echo $form->input('email', array('label' => __('メールアドレス', true), 'type' => 'text'));
        echo $form->input('phone', array('label' => __('携帯電話', true), 'type' => 'text'));
        echo $form->input('companyid', array('label' => __('会社', true), 'type' => 'select', 'options' => $listCompanies, 'empty' => __(' -- 選択 -- ', true)));
        echo $form->input('local_phone', array('label' => __('内線電話', true), 'type' => 'text'));
        echo $form->input('usercode', array('label' => 'テナントコード', 'type' => 'text', 'disabled' => true));
        //echo $form->input('role', array('label' => __('User Type', true), 'type' => 'radio', 'options' => $roleOptions, 'value' => '1'));
        //echo $form->input('password',array('label'=>__('pass',true),'type'=>'password'));
        echo $form->input('status', array('label' => __('状態', true), 'type' => 'radio', 'options' => $stsOptions));
        echo $form->button(__('サブミット', true), array('type' => 'submit'));
        echo $form->end();
        ?>
    </div>
</div>
