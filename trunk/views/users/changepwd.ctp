<?php

/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
/* @var $session SessionHelper */
/* @var $this View */
?>
<?php

echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'changepwd', $uid)));
//echo $form->input('oldpwd', array('type' => 'password', 'label' => __('Old Password', true)));
echo $form->input('newpwd', array('type' => 'password', 'label' => __('New Password', true)));
echo $form->input('renewpwd', array('type' => 'password', 'label' => __('Re-New Password', true)));
//echo $form->input('oldpawd', array('type'=>'password','label'=> __('Old Password',true)));
echo $form->button('submit', array('type' => 'submit'));
//echo $form->button('close', array('onclick' => 'closePopUp()'));
if (@$isChanged):
    ?>
    <script>
        window.close();
        window.opener.alert('Changed password successful!');
    </script>
<?php endif; ?>
