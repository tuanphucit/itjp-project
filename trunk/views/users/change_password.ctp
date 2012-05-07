<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<div id="about">
    <h2><?php __('プロファイル変更'); ?></h2>
    <?php //debug($User); ?>
    <center>
   
       <?php
        echo $form->create('User', array('action'=>'change_password', 'onsubmit' => "return confirm('" . __('このテナントさんを本当に変更したいですか？', true) . "')"));?>
        <table style="margin: 50px auto;">
        <?php
        
        echo $form->input('password', array('label' => __('今のパスワード', true), 'type' => 'password', 'value'=>""));
        echo $form->input('newpass', array('label' => __('新パスワード', true), 'type' => 'password', ));      
        echo $form->input('confirm', array('label' => __('パスワード再タイプ', true), 'type' => 'password',));       
        echo $form->input('id', array('type' => 'hidden', 'value'=>$User['User']['id']));
        echo $form->input('oldpassword', array('type' => 'hidden', 'value'=>$User['User']['password']));
        echo $form->button(__('変更', true), array('type' => 'submit'));
        echo $form->button(__('リセット', true), array('type' => 'reset', 'id'=>'reset'));
		?>
        </table>
        <?php echo $form->end();?>
    
    </center>
</div>