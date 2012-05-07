<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $limit int */
/* @var $data array */
/* @var $rdurl String */
?>
<div id="title_box">
    <h2> Management</h2>
</div>
<div id="search_box">
    <?php
    echo $form->create();
    echo $form->input('fsstatus', array('label' => 'Status:', 'type' => 'select', 'options' => array(), 'div' => false, 'empty' => '--All--'));
    echo $form->input('fsformtime', array('label' => 'From:', 'type' => 'text', 'div' => false));
    echo $form->input('fstotime', array('label' => 'To:', 'type' => 'text', 'div' => false));
    echo $form->input('fscustomer', array('label' => 'Customer:', 'type' => 'text', 'div' => false));
    echo $form->end(array('label' => 'Search', 'div' => false));
    ?>
</div>
<div id="result_box">
    <?php echo $this->element('/../requests/list.ajax'); ?>
</div>
<?php
//debug($list);
//echo $this->element('sql_dump');
?>