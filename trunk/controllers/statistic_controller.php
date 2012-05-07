<?php

/**
 * @property WebConfig $WebConfig
 */
class StatisticController extends AppController {

    var $name = "Statistic";
    var $helpers = array('Html');
    var $uses = array('WebConfig', 'Request');
    var $layout = 'admin';
    /**
	 * @var Request
	 */
	var $Request;
    function beforeFilter() {
        parent::beforeFilter();
    }

    function admin_chart() {
        
    }

    function admin_export_file() {
        $this->redirect(array('controller'=>'requests', 'action'=>'admin_csvexport'));
    }

    function admin_config() {
        if (!empty($this->data)) {
            //debug($this->data);
            if ($this->data['WebConfig']['begin']['hour'] == "")
                $this->data['WebConfig']['begin']['hour'] = "00";
            if ($this->data['WebConfig']['begin']['min'] == "")
                $this->data['WebConfig']['begin']['min'] = "00";
            if ($this->data['WebConfig']['end']['hour'] == "")
                $this->data['WebConfig']['end']['hour'] = "00";
            if ($this->data['WebConfig']['end']['min'] == "")
                $this->data['WebConfig']['end']['min'] = "00";

            $data = array(
                'WebConfig' => array(
                    'begin_work_time' => $this->data['WebConfig']['begin']['hour'] . ':' . $this->data['WebConfig']['begin']['min'] . ':00',
                    'end_work_time' => $this->data['WebConfig']['end']['hour'] . ':' . $this->data['WebConfig']['end']['min'] . ':00',
                    'time_unit' => $this->data['WebConfig']['unit'],
                    'request_expense' => $this->data['WebConfig']['request'],
                    'detroy_expense' => $this->data['WebConfig']['detroy'],
                    'punish_expense' => $this->data['WebConfig']['punish'],
                    'id' => 1
                )
            );
            //debug($data);
            if ($this->WebConfig->save($data)) {
                $this->Session->setFlash(__('設定の更新が成功です。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect('/admin');
            } else {
                $this->Session->setFlash(__('更新するのが保存されません。', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
        } else {
            $config = $this->WebConfig->read(null, 1);
            //debug($config);
            $begin = explode(':', $config['WebConfig']['begin_work_time']);
            $end = explode(':', $config['WebConfig']['end_work_time']);
            $this->data['WebConfig']['begin']['hour'] = $begin['0'];
            $this->data['WebConfig']['begin']['min'] = $begin['1'];
            $this->data['WebConfig']['end']['hour'] = $end['0'];
            $this->data['WebConfig']['end']['min'] = $end['1'];
            //debug($begin);
            $this->data['WebConfig']['unit'] = $config['WebConfig']['time_unit'];
            $this->data['WebConfig']['request'] = $config['WebConfig']['request_expense'];
            $this->data['WebConfig']['detroy'] = $config['WebConfig']['detroy_expense'];
            $this->data['WebConfig']['punish'] = $config['WebConfig']['punish_expense'];
        }
    }

}

?>