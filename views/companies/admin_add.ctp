<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
$html->addCrumb(__('管理者サイト', true), '/admin');
$html->addCrumb(__('会社管理', true), '/admin/companies');
$html->addCrumb(__('会社追加', true), '/admin/companies/add');
?>
<div class="module width_full">
    <div class="module_header">
        <h3 style="width: 40%"><?php __('会社追加') ?></h3>
        <div class="header_action">
            <ul class="tabs">
                <li><?php echo $html->link(__('リストに戻る', true), array('action' => 'admin_index'), array('title' => __('リストに戻る', true))); ?></li>
            </ul>
        </div>
    </div>
    <div id="search_box" class="module_content">
        <?php
        //TODO : make style cho form admin add new company
        echo $form->create('Company');
        echo $form->input('code', array('type' => 'text','label' => 'コード'));
        echo $form->input('name',array('type'=>'text','label'=>'名'));
        echo $form->end(__('サブミット', true));
        ?>
    </div>
</div>