<?php

class RequestsController extends AppController {

    var $name = 'Requests';
    var $helpers = array('Ajax', 'Js');
    var $components = array('RequestHandler');
    var $paginate = array('order' => array('Request.update_time' => 'desc'), 'limit' => '10');

    /**
     * @var Request
     */
    var $Request;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

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
            $this->Session->setFlash(__('Invalid request', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('request', $this->Request->read(null, $id));
    }

    function admin_add() {
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

}
