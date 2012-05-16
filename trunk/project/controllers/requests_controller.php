<?php

class RequestsController extends AppController {

    var $name = 'Requests';
    var $helpers = array('Ajax', 'Js', 'Csv');
    var $components = array('RequestHandler');
    var $uses = array('Request', 'RequestDetail', 'Room');
    //var $paginate = array('order' => array('Request.update_time' => 'desc'), 'limit' => '10');

    /**
     * @var Room
     */
    var $Room;

    /**
     * @var Request
     */
    var $Request;

    /**
     * @var RequestDetail
     */
    var $RequestDetail;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;
	
    function beforeFilter(){
    	parent::beforeFilter();
    }
    
    function index() {
        //$this->layout = 'test';
        //debug($this->data);
        $conditions = array();
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'update_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->set('rdurl', 'http://localhost/itjp-project/requests/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate());
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid request', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('request', $this->Request->read(null, $id));
    }

    function add() {
        if ($this->RequestHandler->isAjax()) {
            //TODO booking by ajax
            $this->layout = 'ajax';
        }
        $this->set('title_for_layout', 'Booking Room');
        $this->set('listRoom', $this->Room->find('list', array('fiels' => array('id', 'name'))));
        if (!empty($this->data)) {
            $this->Request->create();
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('The request has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid request', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('The request has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Request->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for request', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Request->delete($id)) {
            $this->Session->setFlash(__('Request deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Request was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function check($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid room for check', true), 'default', array('class' => CLASS_ERROR_ALERT));
        }
        if (!empty($this->data)) {
            $conditions = array();
            if (isset($this->data['Request']['roomid']) && !empty($this->data['Request']['roomid']) && $id == null) {
                $id = (int) $this->data['Request']['roomid'];
            }
            if (isset($this->data['Request']['fromtime'])) {
                $conditions['RequestDetail.begin_time >='] = $this->data['Request']['fromtime'];
            }
            if (isset($this->data['Request']['totime'])) {
                $conditions['Request.create_time <='] = $this->data['Request']['totime'];
            }
        }
        $this->layout = 'popup';
        $this->set('room', $this->Room->find('all', array('fiels' => array('id', 'name'), 'conditions' => array('Room.id' => $id))));
    }

    function admin_index() {
        //debug($this->params);
        $conditions = array();
        if (isset($this->data['Request']) && !empty($this->data['Request'])) {
            if (isset($this->data['Request']['room'])) {
                $conditions['Room.name LIKE'] = '%' . $this->data['Request']['room'] . '%';
            }
            if (isset($this->data['Request']['fromtime'])) {
                $conditions['Request.create_time >='] = $this->data['Request']['fromtime'];
            }
            if (isset($this->data['Request']['totime'])) {
                $conditions['Request.create_time <='] = $this->data['Request']['totime'];
            }
            if (isset($this->data['Request']['status'])) {
                $conditions['Request.statusid'] = $this->data['Request']['status'];
            }
        }
        $limit = isset($this->params['named']['limit']) && !empty($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) && !empty($this->params['named']['sort']) ? $this->params['named']['sort'] : 'update_time';
        $direction = isset($this->params['named']['direction']) && !empty($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) && !empty($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->set('title_for_layout', __('Booking Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/requests/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
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
            $this->Session->setFlash(__('Invalid request', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $conditions = array('RequestDetail.requestid' => $id);
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'RequestDetail.begin_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'asc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
        //$sort = $sort == 'type' ? 'role' : $sort;
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Booking Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/requests/view/' . $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('Request', $this->Request->read(null, $id));
        $this->set('list', $this->paginate('RequestDetail'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_detail.ajax');
        }
    }

    function admin_add() {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Booking Management', true));
        if (!empty($this->data)) {
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('The request has been saved', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid request', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Request->save($this->data)) {
                $this->Session->setFlash(__('The request has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The request could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Request->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for request', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Request->delete($id)) {
            $this->Session->setFlash(__('Request deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Request was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
    function admin_csvexport(){
    	$this->layout = 'ajax';
        $this->set('rs', $this->Request->find('all'));
    }

}