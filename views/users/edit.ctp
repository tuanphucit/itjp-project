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
        $stsOptions = array(
            '2' => __('未確認', true),
            '1' => __('アクティブ', true),
            '0' => __('無効化', true)
        );
        $roleOptions = array(
            '1' => __('テナント', true),
            '2' => __('管理者', true)
        );
        echo $form->create('User', array('onsubmit' => "return confirm('" . __('このテナントさんを本当に変更したいですか？', true) . "')"));?>
        <table style="margin: 50px auto;">
        <?php
        echo $form->input('fullname', array('label' => __('氏名', true), 'type' => 'text', 'value'=>isset($User['User']['fullname']) ? $User['User']['fullname']: ""));
        echo $form->input('email', array('label' => __('メールアドレス', true), 'type' => 'text', 'value'=>isset($User['User']['email']) ? $User['User']['email']: ""));
        //echo $form->input('password', array('label' => __('パスワード', true), 'type' => 'password', 'value'=>isset($User['User']['password'])?$User['User']['password']:""));
        echo $form->input('phone', array('label' => __('携帯電話', true), 'type' => 'text', 'value'=>isset($User['User']['phone'])?$User['User']['phone']:""));
       
        echo $form->input('local_phone', array('label' => __('内線電話', true), 'type' => 'text', 'value'=>isset($User['User']['local_phone'])?$User['User']['local_phone']:""));
        echo $form->input('usercode', array('label' => 'テナントコード', 'type' => 'text', 'disabled' => true, 'value'=>isset($User['User']['usercode'])?$User['User']['usercode']:""));
        //echo $form->input('role', array('label' => __('User Type', true), 'type' => 'radio', 'options' => $roleOptions, 'value' => '1'));
        echo $form->input('id', array('type' => 'hidden', 'value'=>$User['User']['id']));
        echo $form->input('status', array('type' => 'hidden', 'value'=>$User['User']['status']));
        echo $form->input('usercode', array('type' => 'hidden', 'value'=>$User['User']['usercode']));
        echo '状態：　'.$stsOptions[$User['User']['status']].'<br>';
        echo $form->button(__('更新', true), array('type' => 'submit'));
        echo $form->button(__('リセット', true), array('type' => 'reset', 'id'=>'reset'));
		?>
        </table>
        <?php echo $form->end();?>
    
    </center>
</div>