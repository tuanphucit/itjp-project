<?php

/**
 * @property WebConfig $WebConfig
 * @property User $User
 */
class StatisticController extends AppController {

    var $name = "Statistic";
    var $helpers = array('Html');
    var $uses = array('WebConfig', 'Request', 'User', 'Phat');
    var $layout = 'admin';

    /**
     * @var Request
     */
    var $Request;

    function beforeFilter() {
        parent::beforeFilter();
    }

    function chart() {
        $beginMonth = date('Y-m') . '-01';
        if (isset($this->data ['User'] ['mouth']) && !empty($this->data ['User'] ['mouth'])) {
            $endMonth = date('Y-m-d', strtotime($this->data ['User'] ['mouth'] . '-01'));
        } else {
            $this->data ['User'] ['mouth'] = date('Y-m');
        }
        $endMonth = date('Y-m-t', strtotime($beginMonth));
        $conditions = array(
            'Request.create_by' => $this->Auth->user('id'),
            'Request.update_time BETWEEN ? AND ?' => array($beginMonth, $endMonth),
        );

        $fields = array(
            'Request.*',
            'Requester.fullname',
            'Room.name'
        );
        $this->paginate = array(
            'fields' => $fields,
            'conditions' => $conditions,
        );
        $this->set('list', $this->paginate('Request'));
        $this->set('title_for_layout', __('予約管理', true));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax_1');
        } else {
            $this->layout = 'default';
        }
    }

    function view($id = null) {
        $this->layout = 'popup';
        if (empty($id)) {
            $id = $this->Auth->user('id');
        }
        if (($id != $this->Auth->user('id')) && ($this->Auth->user('role') != USER_ROLE_ADMIN)){
            die('No permission access');
        }
        //$conditions = array('User.id' => $id);
        $beginMouth = date('Y-m') . '-01';
        if (isset($this->data ['WebConfig'] ['month']) && !empty($this->data ['WebConfig'] ['month'])) {
            $beginMouth = date('Y-m-d', strtotime($this->data ['WebConfig'] ['month'] . '-01'));
        } else {
            $this->data ['WebConfig'] ['month'] = date('Y-m');
        }
        $endMouth = date('Y-m-t', strtotime($beginMouth));
        $this->User->hasMany = array(
            'Request' => array(
                'className' => 'Request',
                'foreignKey' => 'create_by',
                'dependent' => true,
                'conditions' => array(
                    'Request.update_time BETWEEN ? AND ?' => array($beginMouth, $endMouth)
                ),
            ),
            'Phat' => array(
                'className' => 'Phat',
                'foreignKey' => 'userid',
                'dependent' => true,
                'conditions' => array(
                    'Phat.time BETWEEN ? AND ?' => array($beginMouth, $endMouth)
                ),
            )
        );
        $history = new DateTime();
        $history->sub(new DateInterval($this->WebConfig->field('limit_time', 1)));
        $period = new DatePeriod($history, new DateInterval('P1M'), new DateTime);
        $monthOps = array();
        foreach ($period as $dt) {
            $monthOps[$dt->format("Y-m")] = $dt->format("Y-m");
        }
        $monthOps[date('Y-m')]=date('Y-m');
        $this->set('monthOptions', $monthOps);
        $this->set('punish_expense', $this->WebConfig->field('punish_expense', 1));
        $this->set('list', $this->User->read(null, $id));
        //$this->set('title_for_layout', __('予約管理', true));
    }

    function admin_chart() {

        $conditions = array();
        $beginMouth = date('Y-m') . '-01';
        if (isset($this->data ['User'] ['mouth']) && !empty($this->data ['User'] ['mouth'])) {
            $beginMouth = date('Y-m-d', strtotime($this->data ['User'] ['mouth'] . '-01'));
        } else {
            $this->data ['User'] ['mouth'] = date('Y-m');
        }
        if (isset($this->data ['User'] ['cust']) && !empty($this->data ['User'] ['cust'])) {
            $conditions ['User.fullname LIKE'] = '%' . trim($this->data ['User'] ['cust']) . '%';
        }
        $endMouth = date('Y-m-t', strtotime($beginMouth));
        $this->User->hasMany = array(
            'Request' => array(
                'className' => 'Request',
                'foreignKey' => 'create_by',
                'dependent' => true,
                'conditions' => array(
                    'Request.update_time BETWEEN ? AND ?' => array($beginMouth, $endMouth)
                ),
            ),
            'Phat' => array(
                'className' => 'Phat',
                'foreignKey' => 'userid',
                'dependent' => true,
                'conditions' => array(
                    'Phat.time BETWEEN ? AND ?' => array($beginMouth, $endMouth)
                ),
            )
        );
        $limit = isset($this->params ['named'] ['limit']) && !empty($this->params ['named'] ['limit']) ? (int) $this->params ['named'] ['limit'] : 10;
        $sort = isset($this->params ['named'] ['sort']) && !empty($this->params ['named'] ['sort']) ? $this->params ['named'] ['sort'] : 'update_time';
        $direction = isset($this->params ['named'] ['direction']) && !empty($this->params ['named'] ['direction']) ? $this->params ['named'] ['direction'] : 'desc';
        $page = isset($this->params ['named'] ['page']) && !empty($this->params ['named'] ['page']) ? (int) $this->params ['named'] ['page'] : 1;
        $fields = array(
            'User.*',
            'Company.name',
        );
        $this->paginate = array(
            'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'sort' => array($sort => $direction),
            'page' => $page,
//            'recursive' => 1
        );
        $this->set('punish_expense', $this->WebConfig->field('punish_expense', 1));
        $this->set('list', $this->paginate('User'));
        $this->set('title_for_layout', __('予約管理', true));
        $this->set('rdurl', $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        } else {
            $this->layout = 'admin';
        }
    }

    function admin_export_file() {
    	$history = new DateTime();
        $history->sub(new DateInterval($this->WebConfig->field('limit_time', 1)));
        $period = new DatePeriod($history, new DateInterval('P1M'), new DateTime);
        $monthOps = array();
        foreach ($period as $dt) {
            $monthOps[$dt->format("Y-m")] = $dt->format("Y-m");
        }
        $monthOps[date('Y-m')] = date('Y-m');
        $this->set('monthOptions', $monthOps);
    }

    function admin_config() {
        $this->set('title_for_layout', 'オプション');
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
                    'limit_time' => $this->data['WebConfig']['limit_time'],
                    'detroy_time' => $this->data['WebConfig']['detroy_time'],
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
            $this->data['WebConfig']['limit_time'] = $config['WebConfig']['limit_time'];
            $this->data['WebConfig']['detroy_time'] = $config['WebConfig']['detroy_time'];
            $this->data['WebConfig']['request'] = $config['WebConfig']['request_expense'];
            $this->data['WebConfig']['detroy'] = $config['WebConfig']['detroy_expense'];
            $this->data['WebConfig']['punish'] = $config['WebConfig']['punish_expense'];
        }
    }

}

?>