<?php

class RoomTypesController extends AppController {

    var $name = 'RoomTypes';
    var $helpers = array('Ajax', 'Js');
    var $components = array('RequestHandler');

    /**
     * @var RoomType
     */
    var $RoomType;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function admin_index() {
        //debug($this->params);
        $conditions = array();

        $limit = isset($this->params['named']['limit']) && !empty($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) && !empty($this->params['named']['sort']) ? $this->params['named']['sort'] : 'name';
        $direction = isset($this->params['named']['direction']) && !empty($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) && !empty($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('id', 'name', 'description');
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->set('title_for_layout', __('Room Types Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/room_types/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate());
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        } else {
            $this->layout = 'admin';
        }
    }

    function admin_add() {
        $this->layout = "admin";
        $this->set('title_for_layout', __('Room Types Management', true));
        if (!empty($this->data)) {
            $this->RoomType->create();
            if ($this->RoomType->save($this->data)) {
                $this->Session->setFlash(__('The room type has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room type could not be saved. Please, try again.', true));
            }
        }
    }

    function admin_edit($id = null) {
        $this->layout = "admin";
        $this->set('title_for_layout', __('Room Types Management', true));
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid room type', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->RoomType->save($this->data)) {
                $this->Session->setFlash(__('The room type has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room type could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->RoomType->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        //$this->uses = array('Room', 'RoomType');
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for room type', true));
            $this->redirect(array('action' => 'admin_index'));
        }
        $data = $this->RoomType->find('first', array('conditions' => array('id' => $id)));
        if (count($data['Room']) > 0) {
            $this->Session->setFlash(__("Room type has used. You can't delete.", true));
            $this->redirect(array('action' => 'admin_index'));
        }
        if ($this->RoomType->delete($id)) {
            $this->Session->setFlash(__('Room type deleted', true));
            $this->redirect(array('action' => 'admin_index'));
        }
        $this->Session->setFlash(__('Room type was not deleted', true));
        $this->redirect(array('action' => 'admin_index'));
    }

}
