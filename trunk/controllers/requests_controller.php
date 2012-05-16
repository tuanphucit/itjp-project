<?php

/**
 * @property Room $Room
 * @property Request $Request
 * @property WebConfig $WebConfig
 * @property RequestHandlerComponent $RequestHandler
 */
class RequestsController extends AppController {

    var $name = 'Requests';
    var $helpers = array('Ajax', 'Js', 'Csv');
    var $components = array('RequestHandler');
    var $uses = array('Request', 'WebConfig', 'Room', 'User', 'RoomType');

    function beforeFilter() {
        parent::beforeFilter();
    }

    function index() {
        // TODO: lay dk tim kiem
        $conditions ['Request.create_by'] = $this->Auth->user('id');
        if (isset($this->data ['Request'] ['fsfromtime']) && !empty($this->data ['Request'] ['fsfromtime'])) {
            $conditions ['Request.date >='] = $this->data ['Request'] ['fsfromtime'];
        }
        if (isset($this->data ['Request'] ['fstotime']) && !empty($this->data ['Request'] ['fstotime'])) {
            $conditions ['Request.date <='] = $this->data ['Request'] ['fstotime'];
        }
        if (isset($this->data ['Request'] ['fsstatus']) && !empty($this->data ['Request'] ['fsstatus'])) {
            $conditions ['Request.status'] = $this->data ['Request'] ['fsstatus'];
        }
        //$limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params ['named'] ['sort']) ? $this->params ['named'] ['sort'] : 'update_time';
        $direction = isset($this->params ['named'] ['direction']) ? $this->params ['named'] ['direction'] : 'desc';
        //$page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        $fields = array('Request.*', 'Requester.fullname', 'Updater.fullname', 'Room.name');
        $this->paginate = array('fields' => $fields, 'conditions' => $conditions, //'limit' => $limit,
            'order' => array($sort => $direction)); //'page' => $page,
        //'recursive' => 0


        $this->set('title_for_layout', __('予約管理', true));
        $this->set('page', 'Booking');
        $this->set('list', $this->paginate());
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('要求が正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        //        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        //        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'date';
        //        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'asc';
        //        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        $fields = array('Request.*', 'Requester.fullname', 'Updater.fullname', 'Room.name');
        $request = $this->Request->read($fields, $id);
        //$conditions = array('Request.code' => $request['Request']['code'], 'Request.create_by' => $this->Auth->user('id'));
        //$this->paginate = array(
        //    'fields' => $fields,
        //    'conditions' => $conditions,
        //            'limit' => $limit,
        //            'order' => array($sort => $direction),
        //            'page' => $page,
        //            'recursive' => 0
        //);
        $this->set('title_for_layout', __('予約管理', true));
        //        $this->set('rdurl', $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        //        $this->set('limit', $limit);
        $this->set('Request', $request);
        $this->set('page', 'Booking');
        //$this->set('list', $this->paginate('Request'));
        //        if ($this->RequestHandler->isAjax()) {
        //            $this->layout = 'ajax';
        //            $this->render('list_detail.ajax');
        //        }
    }

    function add($id = null) {
        $this->layout = 'popup';
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fields' => array('id', 'name'))));
        $this->set('listTimes', $this->WebConfig->getTimeList());
        $this->set('title_for_layout', '予約会議室');
        if (!empty($this->data)) {
            $begin_time = DateTime::createFromFormat('Y-m-d h:i:s', $this->data ['Request'] ['begindate'] . ' ' . $this->data ['Request'] ['begintime']);
            $end_time = DateTime::createFromFormat('Y-m-d h:i:s', $this->data ['Request'] ['enddate'] . ' ' . $this->data ['Request'] ['endtime']);
            if ($begin_time >= $end_time) {
                // Error Bat dau su ket thuc
                $this->Session->setFlash(__('予約が成功しません', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
            $noRows = $this->_check($this->data ['Request'] ['roomid'], $begin_time, $end_time);
            if ($noRows > 0) {
                $this->Session->setFlash(__('予約時間が合っていません', true), 'default', array('class' => CLASS_WARNING_ALERT));
                return;
            }
            $now = date('Y-m-d H:i:s');
            $code = $this->_genCode();
            $myId = $this->Auth->user('id');
            $this->data ['Request'] ['begin_time'] = $begin_time->format('Y-m-d H:i:s');
            $this->data ['Request'] ['end_time'] = $end_time->format('Y-m-d H:i:s');
            $this->data ['Request'] ['create_by'] = $myId;
            $this->data ['Request'] ['create_time'] = $now;
            $this->data ['Request'] ['update_by'] = $myId;
            $this->data ['Request'] ['update_time'] = $now;
            $this->data ['Request'] ['code'] = $code;
            $this->data ['Request'] ['status'] = REQUEST_STATUS_APROVED;
                  	
        	$room = $this->Room->read('renting_fee', $this->data ['Request'] ['roomid']);
            $time = get_time_diff($this->data['Request']['begin_time'], $this->data['Request']['begin_time']);
            $blocks = $time['D']*48 + $time['H']*2 + $time['I']/30;
            $this->data ['Request'] ['rent_expense'] = $blocks*$room['Room']['renting_fee'];
            $this->data ['Request'] ['request_expense'] = $this->WebConfig->field('request_expense', array('id' => 1));
            $this->data ['Request'] ['detroy_expense'] = 0;
            $this->data ['Request'] ['punish_expense'] = 0;
            $this->Request->create($this->data);
            if ($this->Request->save()) {
                $this->set('isOk', true);
                //$this->Session->setFlash(__('Booking Success', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            } else {
                $this->Session->setFlash(__('予約が成功しません', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
        } else {
            $this->data ['Request'] ['roomid'] = $id;
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('要求がただしくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('要求が保存されます。', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('要求が保存されできません。もう一度、お願いします。', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Request->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('要求のため、ＩＤが正しくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        $date = date('Y-m-d H:i:s');

        $request = $this->Request->read(array('begin_time', 'status'), $id);
        if ($request ['Request'] ['status'] != REQUEST_STATUS_CANCELED && $request ['Request'] ['status'] != REQUEST_STATUS_FINISH) {
            $now = strtotime($date);
            $begin = strtotime($request ['Request'] ['begin_time']);
            //$this->log(abs ( $now - $begin ), 'toan');
            //Xem lai cho nay :((
            if (abs($now - $begin) >= 60 * 60 * 2) {
                $this->Request->id = $id;
                //TODO : thay doi phi theo status
                $this->Request->saveField('status', REQUEST_STATUS_CANCELED);
                $this->Request->saveField('update_time', date('Y-m-d H:i:s'));
                $hi = $this->WebConfig->read('detroy_expense', 1);
                $this->Request->saveField('detroy_expense', $hi ['WebConfig'] ['detroy_expense']);
                $this->Session->setFlash(__('予約がキャンセルしました', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('キャンセルできません。', true), 'default', array('class' => CLASS_ERROR_ALERT));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('もうキャンセルしましたまたは終了しました。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
    }

    function check() {
        $this->layout = 'ajax';
        if (empty($this->data)) {
            echo json_encode(array('code' => '1', 'msg' => __('データが合っていません', true)));
            return;
        }
        $begin_time = DateTime::createFromFormat('Y-m-d H:i:s', $this->data ['Request'] ['begindate'] . ' ' . $this->data ['Request'] ['begintime']);
        $end_time = DateTime::createFromFormat('Y-m-d H:i:s', $this->data ['Request'] ['enddate'] . ' ' . $this->data ['Request'] ['endtime']);
        $now = new DateTime();
        if ($begin_time < $now){
            echo json_encode(array('code' => '3', 'msg' => __('この時間は誰かが予約しました。', true)));
            return;
        }
        if ($begin_time >= $end_time) {
            // Error Bat dau su ket thuc
            echo json_encode(array('code' => '2', 'msg' => __('始まる時間は終わる時間より遅いです。', true)));
            return;
        }
        $re = $this->_check($this->data ['Request'] ['roomid'], $begin_time, $end_time);
        if ($re == 0) {
            echo json_encode(array('code' => '0', 'msg' => __('OK', true)));
            return;
        } else {
            echo json_encode(array('code' => '3', 'msg' => __('この時間は誰かが予約しました。', true)));
            return;
        }
    }

    function admin_index() {
        $conditions = array();
        //TODO : lay dk tim kiem
        $limit_time = (string) $this->WebConfig->field('limit_time', array('WebConfig.id'=>1));
        $toDay = new DateTime();
        $conditions['Request.update_time >='] = $toDay->sub(new DateInterval($limit_time))->format('Y-m-d');
        $limit = isset($this->params ['named'] ['limit']) && !empty($this->params ['named'] ['limit']) ? (int) $this->params ['named'] ['limit'] : 10;
        $sort = isset($this->params ['named'] ['sort']) && !empty($this->params ['named'] ['sort']) ? $this->params ['named'] ['sort'] : 'update_time';
        $direction = isset($this->params ['named'] ['direction']) && !empty($this->params ['named'] ['direction']) ? $this->params ['named'] ['direction'] : 'desc';
        $page = isset($this->params ['named'] ['page']) && !empty($this->params ['named'] ['page']) ? (int) $this->params ['named'] ['page'] : 1;
        //$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
        $this->paginate = array(//'fields' => $fields,
            'conditions' => $conditions, 'limit' => $limit, 'order' => array($sort => $direction), 'page' => $page, 'recursives' => 0);
        $this->set('title_for_layout', __('予約管理', true));
        $this->set('rdurl', $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);

        $this->set('list', $this->paginate());
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        } else {
            $this->layout = 'admin';
        }
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('要求が正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $limit = isset($this->params ['named'] ['limit']) ? (int) $this->params ['named'] ['limit'] : 10;
        $sort = isset($this->params ['named'] ['sort']) ? $this->params ['named'] ['sort'] : 'date';
        $direction = isset($this->params ['named'] ['direction']) ? $this->params ['named'] ['direction'] : 'asc';
        $page = isset($this->params ['named'] ['page']) ? (int) $this->params ['named'] ['page'] : 1;
        $fields = array('Request.*', 'Requester.fullname', 'Updater.fullname', 'Room.name', 'TIMEDIFF(Request.end_time,Request.begin_time) AS time', '(Request.request_expense+Request.detroy_expense+Request.punish_expense) AS total_price');
        $request = $this->Request->read($fields, $id);
        $conditions = array('Request.code' => $request ['Request'] ['code']);
        $limit_time = (string) $this->WebConfig->field('limit_time', array('WebConfig.id'=>1));
        $toDay = new DateTime();
        $conditions['Request.update_time >='] = $toDay->sub(new DateInterval($limit_time))->format('Y-m-d');
        $this->paginate = array('fields' => $fields, 'conditions' => $conditions, 'limit' => $limit, 'order' => array($sort => $direction), 'page' => $page, 'recursives' => 0);
        $this->layout = 'admin';
        //debug($request);die;
        $this->set('title_for_layout', __('予約管理', true));
        $this->set('rdurl', $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('Request', $request);
        $this->set('list', $this->paginate('Request'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_detail.ajax');
        }
    }

    function admin_add() {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('予約管理', true));
        $this->set('listRoomType', $this->RoomType->find('list', array('fields' => array('id', 'name'))));
        $this->set('listTimes', $this->WebConfig->getTimeList());
        $listUsers = $this->User->find('all', array('fields' => array('id', 'fullname'), 'recursive' => 0));
        usort($listUsers, "cmp");
        $this->set('listUsers', $listUsers);
        //debug($this->data);
        if (!empty($this->data)) {
            $begin_time = DateTime::createFromFormat('Y-m-d h:i:s', $this->data ['Request'] ['begindate'] . ' ' . $this->data ['Request'] ['begintime']);
            $end_time = DateTime::createFromFormat('Y-m-d h:i:s', $this->data ['Request'] ['enddate'] . ' ' . $this->data ['Request'] ['endtime']);
            if ($begin_time >= $end_time) {
                // Error Bat dau su ket thuc
                $this->Session->setFlash(__('Booking not success', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
            $noRows = $this->_check($this->data ['Request'] ['roomid'], $begin_time, $end_time);
            if ($noRows > 0) {
                $this->Session->setFlash(__('時間が合っていません', true), 'default', array('class' => CLASS_WARNING_ALERT));
                return;
            }
            $now = date('Y-m-d H:i:s');
            $userid = $this->Auth->user('id');
            $code = $this->_genCode();
            $this->data ['Request'] ['code'] = $code;
            //$room = $this->Room->read('renting_fee', $this->data ['Request']['roomid']);
            $this->data ['Request'] ['status'] = REQUEST_STATUS_APROVED;
            $hi = $this->WebConfig->read('request_expense', 1);
            $this->data ['Request'] ['begin_time'] = $begin_time->format('Y-m-d H:i:s');
            $this->data ['Request'] ['end_time'] = $end_time->format('Y-m-d H:i:s');
            
            $room = $this->Room->read('renting_fee', $this->data ['Request'] ['roomid']);
            $time = get_time_diff($this->data['Request']['begin_time'], $this->data['Request']['end_time']);
            $blocks = $time['D']*48 + $time['H']*2 + $time['I']/30;
            //debug($time);
            $this->data ['Request'] ['rent_expense'] = $blocks*$room['Room']['renting_fee'];
            
            $this->data ['Request'] ['request_expense'] = $hi ['WebConfig'] ['request_expense'];
            $this->data ['Request'] ['total_price'] = $this->data ['Request'] ['request_expense'];
            $this->data ['Request'] ['paid'] = 0;
            //$this->data['Request']['create_by'] = $userid;
            $this->data ['Request'] ['create_time'] = $now;
            $this->data ['Request'] ['update_by'] = $userid;
            $this->data ['Request'] ['update_time'] = $now;
            //debug($this->data);die();
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('要求が保存されます。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__('要求が保存されできません。もう一度、お願いします。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('要求が正しくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('要求が保存されます。', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('要求が保存されません。もう一度、お願いします。', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Request->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('要求のため、ＩＤが正しくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        $date = date('Y-m-d H:i:s');
        $request = $this->Request->read(array('begin_time', 'status'), $id);
        if ($request ['Request'] ['status'] != REQUEST_STATUS_CANCELED && $request ['Request'] ['status'] != REQUEST_STATUS_FINISH) {
            $now = strtotime($date);
            $begin = strtotime($request ['Request'] ['begin_time']);
            //$this->log(abs ( $now - $begin )/60/60, 'toan');
            if (abs($now - $begin) >= 60 * 60) {
                $this->Request->id = $id;
                $this->Request->saveField('status', REQUEST_STATUS_CANCELED);
                $this->Request->saveField('update_time', date('Y-m-d H:i:s'));
                $hi = $this->WebConfig->read('detroy_expense', 1);
                $this->Request->saveField('detroy_expense', $hi ['WebConfig'] ['detroy_expense']);

                $this->Session->setFlash(__('予約がキャンセルしました', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('キャンセルできません。', true), 'default', array('class' => CLASS_ERROR_ALERT));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('もうキャンセルしましたまたは終了しました。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_csvexport() {
        $this->layout = 'ajax';
        $fields = array('Request.*', 'Requester.fullname', 'Requester.usercode', 'Requester.address', 'Requester.phone', 'Updater.fullname', 'Room.name', 'TIMEDIFF(Request.end_time,Request.begin_time) AS time', '(Request.request_expense+Request.detroy_expense+Request.rent_expense+Request.punish_expense) AS total_price');
        //$conditions = array ('Request.update_time >' => date ( 'Y' ) . '-' . date ( 'm' ) - 1, 'Request.update_time <' => date ( 'Y-m' ) );
        $conditions = array();

        $endMouth = date('Y-m') . '-01';
//        if (isset($this->data ['User'] ['mouth']) && !empty($this->data ['User'] ['mouth'])) {
//            $beginMouth = date('Y-m-d', strtotime($this->data ['User'] ['mouth'] . '-01'));
//        } else {
//            $this->data ['User'] ['mouth'] = date('Y-m');
//        }
        if (isset($this->data ['User'] ['cust']) && !empty($this->data ['User'] ['cust'])) {
            $conditions ['User.fullnane LIKE'] = '%' . trim($this->data ['User'] ['cust']) . '%';
        }
        $beginMouth = date('Y-m', strtotime('1 month ago')) . '-01';
        $this->User->hasMany = array(
            'Request' => array(
                'className' => 'Request',
                'foreignKey' => 'create_by',
                'dependent' => true,
                'conditions' => array(
                    'Request.update_time BETWEEN ? AND ?' => array($beginMouth, $endMouth)
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
        $this->set('list', $this->paginate('User'));
        //$this->set ( 'rs', $this->Request->find ( 'all', array ('fields' => $fields, 'conditions' => $conditions ) ) );
        $userid = $this->Session->read('Auth.User.id');
        $this->set('admin', $this->User->read(array('usercode', 'fullname'), $userid));
    }

    function admin_finish($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('要求が正しくないです。', true));
        }
        $this->Request->id = $id;
        $rs = $this->Request->read(array('roomid', 'begin_time', 'end_time', 'status'), $id);
        $room = $this->Room->read('renting_fee', $rs ['Request'] ['roomid']);

        if ($rs ['Request'] ['status'] != REQUEST_STATUS_FINISH && $rs ['Request'] ['status'] != REQUEST_STATUS_CANCELED) {
            $this->Request->saveField('status', REQUEST_STATUS_FINISH);
            $this->Request->saveField('update_time', date('Y-m-d H:i:s'));
            $begin = strtotime($rs ['Request'] ['begin_time']);
            $end = strtotime($rs ['Request'] ['end_time']);
            $rent = ($end - $begin) / (3600*2) * $room ['Room'] ['renting_fee'];
            //$this->log(($d2 - $d1)/3600,'test');
            $this->Request->saveField('rent_expense', $rent);
            $this->Session->setFlash(__('終了しました。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('もうキャンセルしましたまたは終了しました。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
    }

    function admin_bakking($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('要求が正しくないです。', true));
        }
        $hi = $this->WebConfig->read('punish_expense', 1);
        $this->Request->id = $id;
        $this->Request->saveField('punish_expense', $hi ['WebConfig'] ['punish_expense']);
        $this->Session->setFlash('課徴金を登録しました', 'default', array('class' => CLASS_SUCCESS_ALERT));
        $this->redirect(array('action' => 'index'));
    }

    function admin_action() {
        //debug ( $this->data ['Request'] ['SelectItem'] [0] );
        if ($this->data ['itemaction'] == 1) {
            for ($i = 0; $i < count($this->data ['Request'] ['SelectItem']); $i++) {
                $id = ($this->data ['Request'] ['SelectItem'] [$i]);
                $rs = $this->Request->read(array('roomid', 'begin_time', 'end_time', 'status'), $id);
                $room = $this->Room->read('renting_fee', $rs ['Request'] ['roomid']);

                if ($rs ['Request'] ['status'] != REQUEST_STATUS_FINISH && $rs ['Request'] ['status'] != REQUEST_STATUS_CANCELED) {
                    $this->Request->saveField('status', REQUEST_STATUS_FINISH);
                    $begin = strtotime($rs ['Request'] ['begin_time']);
                    $end = strtotime($rs ['Request'] ['end_time']);
                    $rent = ($end - $begin) / (3600) * $room ['Room'] ['renting_fee'];
                    //$this->log(($d2 - $d1)/3600,'test');
                    $this->Request->saveField('rent_expense', $rent);
                    //$this->Session->setFlash ( __ ( '終了しました。', true ), 'default', array ('class' => CLASS_SUCCESS_ALERT ) );
                    //$this->redirect ( array ('action' => 'index' ) );
                }
            }
            $this->Session->setFlash(__('終了しました。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'index'));
        } elseif ($this->data ['itemaction'] == 2) {
            for ($i = 0; $i < count($this->data ['Request'] ['SelectItem']); $i++) {
                $id = ($this->data ['Request'] ['SelectItem'] [$i]);
                $date = date('Y-m-d H:i:s');
                $request = $this->Request->read(array('begin_time', 'status'), $id);
                if ($request ['Request'] ['status'] != REQUEST_STATUS_CANCELED && $request ['Request'] ['status'] != REQUEST_STATUS_FINISH) {
                    $now = strtotime($date);
                    $begin = strtotime($request ['Request'] ['begin_time']);
                    //$this->log(abs ( $now - $begin )/60/60, 'toan');
                    if (abs($now - $begin) >= 60 * 60 * 24) {
                        $this->Request->id = $id;
                        $this->Request->saveField('status', REQUEST_STATUS_CANCELED);
                        $hi = $this->WebConfig->read('detroy_expense', 1);
                        $this->Request->saveField('detroy_expense', $hi ['WebConfig'] ['detroy_expense']);
                    }
                }
            }
            $this->Session->setFlash(__('予約がキャンセルしました', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Create random code
     * @return String
     */
    private function _genCode() {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = '';

        for ($p = 0; $p < $length; $p++) {
            $string .= substr($characters, mt_rand(0, strlen($characters) - 1), 1);
        }

        return $string;
    }

    /**
     * Check time request
     * @param $roomid int
     * @param $begin DateTime
     * @param $end DateTime
     * @return int number of request between $begin and $end
     */
    private function _check($roomid, $begin, $end) {
        $conditions = array('Request.roomid' => (int) $roomid, //TODO : dk status
            'OR' => array(array('Request.begin_time >=' => $begin->format('Y-m-d H:i:s'), 'Request.begin_time <' => $end->format('Y-m-d H:i:s')), array('Request.end_time >' => $begin->format('Y-m-d H:i:s'), 'Request.end_time <=' => $end->format('Y-m-d H:i:s'))));
        $re = $this->Request->find('count', array('conditions' => $conditions, 'recursive' => - 1));
        return $re;
    }

    function action() {
        if ($this->data ['itemaction'] == 1) {
            for ($i = 0; $i < count($this->data ['Request'] ['SelectItem']); $i++) {
                $id = ($this->data ['Request'] ['SelectItem'] [$i]);
                $date = date('Y-m-d H:i:s');
                $request = $this->Request->read(array('begin_time', 'status'), $id);
                if ($request ['Request'] ['status'] != REQUEST_STATUS_CANCELED && $request ['Request'] ['status'] != REQUEST_STATUS_FINISH) {
                    $now = strtotime($date);
                    $begin = strtotime($request ['Request'] ['begin_time']);
                    //$this->log(abs ( $now - $begin )/60/60, 'toan');
                    if (abs($now - $begin) >= 60 * 60 * 24) {
                        $this->Request->id = $id;
                        $this->Request->saveField('status', REQUEST_STATUS_CANCELED);
                        $hi = $this->WebConfig->read('detroy_expense', 1);
                        $this->Request->saveField('detroy_expense', $hi ['WebConfig'] ['detroy_expense']);
                    }
                }
            }
            $this->Session->setFlash(__('予約がキャンセルしました', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'index'));
        }
    }

}
