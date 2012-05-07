<?php

/**
 * @property Room $Room
 */
class EquipsController extends AppController {

    var $name = "Equips";
    var $helpers = array('Ajax', 'Js');
    var $components = array('RequestHandler');
    var $uses = array('Equip', 'Room', 'PosOfEquip');

    /**
     * @var Equip
     */
    var $Equip;

    /**
     * @var PosOfEquip
     */
    var $PosOfEquip;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('admin_index', 'admin_add', 'admin_delete', 'admin_view', 'admin_edit');
    }

    function admin_index() {
        $this->layout = 'admin';
        $conditions = array();
        //TODO : lay dk search thiet bi
        if (isset($this->data['Equip']['code']) && !empty($this->data['Equip']['code'])) {
            $conditions['Equip.code LIKE'] = '%' . $this->data['Equip']['code'] . '%';
        }
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'Equip.start_time';
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
        $this->set('title_for_layout', __('設備管理', true));
        $this->set('rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Equip'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

    function admin_view($id) {
        if (!$id) {
            $this->Session->setFlash(__('設備が正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $conditions = array('PosOfEquip.equipmentid' => $id);
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'PosOfEquip.move_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->layout = 'admin';
        $this->set('title_for_layout', __('設備管理', true));
        $this->set('rdurl', $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('equip', $this->Equip->read(null, $id));
        $this->set('list', $this->paginate('PosOfEquip'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_poe.ajax');
        }
    }

    function admin_add() {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('設備管理', true));
        if (!empty($this->data)) {
            $this->data['Equip']['start_time'] = date('Y-m-d H:i:s');
            if ($this->Equip->save($this->data)) {
                $this->Session->setFlash(__('設備が保存されています。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect('index');
            } else {
                $this->Session->setFlash(__('設備が保存されていません。もう一度お願いします。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

    function admin_delete($id) {
        if (!$id) {
            $this->Session->setFlash(__('設備ＩＤが正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        //TODO : kiem tra xem thiet bi co dang dc dung trong cac phong ko?
        if ($this->Equip->delete($id)) {
            $this->Session->setFlash(__('設備が削除されています。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $this->Session->setFlash(__('設備が削除されていません。もう一度お願いします。', true), 'default', array('class' => CLASS_WARNING_ALERT));
        $this->redirect(array('action' => 'admin_index'));
    }

    function admin_edit($id = null) {
        $this->set('title_for_layout', __('設備管理', true));
        $this->layout = "admin";
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('設備は正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        if (!empty($this->data)) {
            $this->data['Equip']['id'] = (int) $id;
            if ($this->Equip->save($this->data)) {
                $this->Session->setFlash(__('設備が削除されています。', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash(__('設備が削除されていません。もう一度お願いします。', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Equip->read(null, $id);
        }
    }

    function admin_move($id = null, $fid = null, $tid = null) {
        if (!empty($this->data)) {
            if (empty($this->data['Equip']['id']) && $id != null) {
                $this->data['Equip']['id'] = (int) $id;
            }
            if (empty($this->data['Equip']['fid']) && $fid != null) {
                $this->data['Equip']['fid'] = (int) $fid;
            }
            if (empty($this->data['Equip']['tid']) && $tid != null) {
                $this->data['Equip']['tid'] = (int) $tid;
            }
            if (!empty($this->data['Equip']['id']) && !empty($this->data['Equip']['fid']) && !empty($this->data['Equip']['tid'])) {
                //TODO : xu ly viec chuyen do
                //Chuyen thanh cong khi phong chuyen di ton tai thiet bi do va so luong phu hop
                //Khi chuyen thi cap nhat lai bang PosOfEquip
            }
        }
        if (empty($this->data)) {
            $this->data['Equip']['id'] = (int) $id;
            $this->data['Equip']['fid'] = (int) $fid;
            $this->data['Equip']['tid'] = (int) $tid;
        }
        $this->layout = 'admin';
        $this->set('title_for_layout', __('設備管理', true));
        $this->set('listEquips', $this->Equip->find('list', array('fields' => array('id', 'name'))));
        $this->set('listRooms', $this->Room->find('list', array('fields' => array('id', 'name'))));
    }

}

?>