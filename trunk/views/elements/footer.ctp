<div>
    <p>
        <strong><?php printf(__('Copyright &copy; %d Team 09 - IT Japanese', true), date('Y')); ?></strong>
    </p>
    <p>
        <?php
        echo $this->Html->link(
                $this->Html->image('cake.power.gif', array('alt' => __('CakePHP: the rapid development php framework', true), 'border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
        );
        ?>
    </p>
</div>