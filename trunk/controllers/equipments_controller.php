<?php

class EquipmentsController extends AppController {

    var $name = "Equipments";
    var $helpers = array('Ajax', 'Js');
    var $components = array('RequestHandler');
    var $uses = array('Equipment', 'Room', 'PositionsOfEquipment');

    /**
     * @var Room
     */
    var $Room;

    /**
     * @var Equipment
     */
    var $Equipment;

    /**
     * @var PositionsOfEquipment
     */
    var $PositionsOfEquipment;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function BeforeFilter() {
        $this->Auth->allow('admin_index', 'admin_add', 'admin_delete', 'admin_view', 'admin_edit');
    }

    function admin_index() {
        $this->layout = 'admin';
        $conditions = array();
        //TODO : lay dk search thiet bi
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'Equipment.start_time';
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
        $this->set('title_for_layout', __('Equipments Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/equipments/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Equipment'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    function admin_view($id) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $conditions = array('PositionsOfEquipment.equipmentid' => $id);
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'PositionsOfEquipment.move_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
        $sort = $sort == 'type' ? 'role' : $sort;
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Equipments Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/emquipment1s/view/' . $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('equipment', $this->Equipment->read(null, $id));
        $this->set('list', $this->paginate('PositionsOfEquipment'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_poe.ajax');
        }
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->data['Equipment']['start_time'] = date('Y-m-d H:i:s');
            if ($this->Equipment->save($this->data)) {
                $this->Session->setFlash('Your equipment has been added.');
                $this->redirect('index');
            }
        }
    }

    function admin_delete($id) {
        $this->Equipment->delete($id);
        $this->redirect('index');
    }

    function admin_edit($id = null) {
        $this->Equipment->id = $id;
        if (empty($this->data)) {
            $this->data = $this->Equipment->read();
        } else {
            $this->data['Equipment']['start_time'] = date('Y-m-d H:i:s');
            if ($this->Equipment->save($this->data)) {
                $this->Session->setFlash('Your equipment has been updated.');
                $this->redirect('index');
            }
        }
    }

}

?>