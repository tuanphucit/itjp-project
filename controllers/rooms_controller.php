<?php

class RoomsController extends AppController {

    var $name = 'Rooms';
    var $helpers = array('Ajax', 'Js');
    var $components = array('RequestHandler');
    var $uses = array('Room', 'RoomType', 'Request');

    /**
     * @var Room
     */
    var $Room;

    /**
     * @var Request
     */
    var $Request;

    /**
     * @var RoomType
     */
    var $RoomType;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function index() {
        $this->Room->recursive = 0;
        $this->set('rooms', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid room', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('room', $this->Room->read(null, $id));
    }

    function admin_index() {
        $this->layout = 'admin';
        //debug($this->data);
        $conditions = array();
        //TODO : lay dk search
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'Room.name';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'asc';
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
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/rooms/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Room'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    function admin_view($id = null) {
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->layout = "admin";
        if (!$id) {
            $this->Session->setFlash(__('Invalid room', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('room', $this->Room->read(null, $id));
    }

    function admin_add() {
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fields' => array('id', 'name'))));
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->layout = "admin";
        if (!empty($this->data)) {
            $this->Room->create();
            if ($this->Room->save($this->data)) {
                $this->Session->setFlash(__('The room has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room could not be saved. Please, try again.', true));
            }
        }
    }

    function admin_edit($id = null) {
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fields' => array('id', 'name'))));
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->layout = "admin";
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid room', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Room->save($this->data)) {
                $this->Session->setFlash(__('The room has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Room->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for room', true));
            $this->redirect(array('action' => 'index'));
        }
        $data = $this->Room->find('first', array('conditions' => array('Room.id' => $id)));
        //debug($data);
        if (count($data['Request']) > 0) {
            $this->Session->setFlash(__("Room has used. You can't delete.", true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Room->delete($id)) {
            $this->Session->setFlash(__('Room deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Room was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}
