<?php

//このコントーラがROOMの操作を管理する物です。
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

    //会議室インでクスページをセットする機能
    // liet ke tat ca cac phong
    function index() {
        $conditions = array();
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
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fiels' => array('id', 'name'))));
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/rooms/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Room'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    //会議室の情報を表す機能
    // chi tiet ve phong
    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid room', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('room', $this->Room->read(null, $id));
    }

    // tim kiem phog chong
    function find() {
        //debug($this->data);
        $conditions = array();
        //TODO : xu ly data submit
        if (isset($this->data['Room']['type']) && !empty($this->data['Room']['type'])) {
            $conditions['Room.typeid'] = (int) $this->data['Room']['type'];
        }
        if (isset($this->data['Room']['seat']) && !empty($this->data['Room']['seat'])) {
            switch ((int) $this->data['Room']['seat']) {
                case 1:
                    $conditions['Room.quantity_seat <='] = 10;
                    break;
                case 2:
                    $conditions['Room.quantity_seat BETWEEN ? AND ?'] = array(10, 20);
                    break;
                case 3:
                    $conditions['Room.quantity_seat BETWEEN ? AND ?'] = array(20, 30);
                    break;
                case 4:
                    $conditions['Room.quantity_seat BETWEEN ? AND ?'] = array(30, 50);
                    break;
                case 5:
                    $conditions['Room.quantity_seat >='] = 50;
                    break;
                default:
                    break;
            }
        }
        //TODO : tim theo thoi gian
        if (isset($this->data['Room']['ftime']) && !empty($this->data['Room']['ftime'])) {
            
        }
        if (isset($this->data['Room']['ttime']) && !empty($this->data['Room']['ttime'])) {
            
        }
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
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fiels' => array('id', 'name'))));
        $this->set('title_for_layout', __('Find Free Rooms', true));
        $this->set('rdurl', 'http://localhost/itjp-project/rooms/find/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Room'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_rooms.ajax');
        }
    }

    //アドミンのインでクスページをセットする機能
    function admin_index() {
        $this->layout = 'admin';
        //debug($this->data);
        $conditions = array();
        //TODO : xu ly data submit
        if (isset($this->data['Room']['name']) && !empty($this->data['Room']['name'])) {
            $conditions['Room.name LIKE'] = $this->data['Room']['name'] . '%';
        }
        if (isset($this->data['Room']['type']) && !empty($this->data['Room']['type'])) {
            $conditions['Room.typeid'] = (int) $this->data['Room']['type'];
        }
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
        $this->set('listRoomTypes', $this->RoomType->find('list', array('fiels' => array('id', 'name'))));
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/rooms/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Room'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    //アドミンのビューページをセットする機能
    function admin_view($id = null) {
        $this->set('title_for_layout', __('Rooms Management', true));
        $this->layout = "admin";
        if (!$id) {
            $this->Session->setFlash(__('Invalid room', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('room', $this->Room->read(null, $id));
    }

    //会議室を追加ページをセットする機能
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

    //会議室を編集ページをセットする機能
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

    //会議室を削除ページをセットする機能
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
