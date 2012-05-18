<?php
/* @var $form FormHelper */
/* @var $html HtmlHelper */
/* @var $js JsHelper */
?>
<?php $html->script(array('jquery-1.5.1.min', 'jquery-ui.min'), array('inline' => false)); ?>
<?php
$item['total_expense'] = 0;
$item['total_paid'] = 0;
$item['total_cantra'] = 0;
$item['rent_expense'] = 0;
$item['request_expense'] = 0;
$item['detroy_expense'] = 0;
$item['punish_expense'] = 0;
$soDatP = count($list['Request']);
$soPhat = count($list['Phat']);
if ($soDatP > 0) {
    foreach ($list['Request'] as $itemreq) {
        $item['total_expense'] += $itemreq['total_expense'];
        $item['rent_expense'] += $itemreq['rent_expense'];
        $item['request_expense'] += $itemreq['request_expense'];
        $item['detroy_expense'] += $itemreq['detroy_expense'];
    }
}
if ($soPhat > 0) {
    foreach ($list['Phat'] as $itemreq) {
        $item['punish_expense'] += $punish_expense;
    }
}
$item['total_expense'] += $item['punish_expense'];
?>
<div class="module width_full">
    <div class="module_content">
        <table style="width: 100%">
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('氏名'); ?></td>
                <td>:</td>
                <td><?php echo $list['User']['fullname']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('UserCode'); ?></td>
                <td>:</td>
                <td><?php echo $list['User']['usercode']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('会社'); ?></td>
                <td>:</td>
                <td><?php echo $list['Company']['name']; ?></td>
            </tr>
            <tr>
                <td colspan="3" align="center" style="background: #CCC">
                    <?php __('Trong thang ' . date('Y-m')); ?>
                    <?php
                    echo $form->create();
                    echo $form->input('month', array('label' => __('Chon thang khac', true), 'type' => 'select', 'options' => $monthOptions, 'div' => false));
                    echo $form->button(__('Submit', true), array('type' => 'submit'));
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('So lan phat'); ?></td>
                <td>:</td>
                <td><?php echo $soPhat; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Phi phat'); ?></td>
                <td>:</td>
                <td><?php echo $item['punish_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('So lan dat phong'); ?></td>
                <td>:</td>
                <td><?php echo $soDatP; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Phi dat phong'); ?></td>
                <td>:</td>
                <td><?php echo $item['request_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Phi thue'); ?></td>
                <td>:</td>
                <td><?php echo $item['rent_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Phi Huy'); ?></td>
                <td>:</td>
                <td><?php echo $item['detroy_expense']; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold; width: 30%;text-align: right"><?php __('Tong tien'); ?></td>
                <td>:</td>
                <td><?php echo $item['total_expense']; ?></td>
            </tr>
            <?php if ($soPhat > 0) { ?>
                <tr>
                    <td colspan="3" align="center" style="background: #CCC">
                        <?php __('Cac lan phat trong thang'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <table border="1" style="width: 100%">
                            <tr>
                                <th style="width: 10%"><?php __('#');?></th>
                                <th><?php __('#');?></th>
                                <th><?php __('時間');?></th>
                                <th><?php __('金');?></th>
                                <th><?php __('ノート');?></th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($list['Phat'] as $phat) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $phat['time']; ?></td>
                                    <td><?php echo $phat['gio'].'時'.$phat['phut'].'分'; ?></td>
                                    <td><?php echo $phat['tien']; ?></td>
                                    <td><?php echo $phat['note']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            <? } ?>
        </table>
    </div>
</div>



