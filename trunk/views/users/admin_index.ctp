<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('テナント管理', true), '/admin/users');
?>
<div class="module width_full">
    <div class="module_header">
        <h3><?php __('テナント管理') ?></h3>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin search user
        $stsOptions = array(
            '2' => __('未確認', true),
            '1' => __('アクティブ', true),
            '0' => __('無効化', true)
        );
        echo $form->create('User');
        echo $form->input('fullname', array('label' => __('氏名', true), 'type' => 'text'));
        echo $form->input('usercode', array('label' => __('テナントコード', true), 'type' => 'text'));
        echo $form->input('phone', array('label' => __('携帯電話', true), 'type' => 'text'));
        echo $form->input('email', array('label' => __('メールアドレス', true), 'type' => 'text'));
        echo $form->input('company', array('label' => __('会社', true), 'type' => 'select', 'options' => $listCompanies, 'empty' => __('-- 全て --', true)));
        echo $form->input('localphone', array('label' => __('内線電話', true), 'type' => 'text'));
        echo $form->input('status', array('label' => __('状態', true), 'type' => 'select', 'options' => $stsOptions, 'empty' => __('-- 全て --', true)));
        echo $form->button(__('検索', true), array('type' => 'submit', 'div' => false));
        echo $form->button(__('リセット', true), array('type' => 'reset', 'div' => false));
        echo $form->end();
        ?>
    </div>
</div>
<div class="module width_full" id="result_box">
    <?php echo $this->element('../users/list.ajax'); ?>
</div>