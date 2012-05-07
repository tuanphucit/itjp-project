<?php
 //このコントーラは会議室タイプの操作を管理する物です。
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
    
    function beforeFilter(){
    	parent::beforeFilter();
    }
    
 //会議室タイプのインでクスページをセットする機能
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
        $this->set('title_for_layout', __('会議室タイプ管理', true));
        $this->set('rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate());
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        } else {
            $this->layout = 'admin';
        }
    }
 //会議室タイプの追加ぺーじをセットする機能
    function admin_add() {
        $this->layout = "admin";
        $this->set('title_for_layout', __('会議室タイプ管理', true));
        if (!empty($this->data)) {
            $this->RoomType->create();
            if ($this->RoomType->save($this->data)) {
                $this->Session->setFlash(__('会議室タイプが保存されます。', true),'default',array('class'=>CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('会議室タイプが保存されません。もう一度、お願いします。', true),'default',array('class'=>CLASS_ERROR_ALERT));
            }
        }
    }
 //会議室タイプの編集ページをセットする機能
    function admin_edit($id = null) {
        $this->layout = "admin";
        $this->set('title_for_layout', __('会議室タイプ管理', true));
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('会議室タイプが正しくないです。', true),'default',array('class'=>CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->RoomType->save($this->data)) {
                $this->Session->setFlash(__('会議室タイプが保存されます。', true),'default',array('class'=>CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('会議室タイプが保存されません。もう一度、お願いします。', true),'default',array('class'=>CLASS_ERROR_ALERT));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->RoomType->read(null, $id);
        }
    }
 //会議室タイプを削除する機能
    function admin_delete($id = null) {
        //$this->uses = array('Room', 'RoomType');
        if (!$id) {
            $this->Session->setFlash(__('会議室タイプためＩＤが正しくないです。', true),'default',array('class'=>CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $data = $this->RoomType->find('first', array('conditions' => array('id' => $id)));
        if (count($data['Room']) > 0) {
            $this->Session->setFlash(__("会議室タイプが使用されます。削除できません。", true),'default',array('class'=>CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        if ($this->RoomType->delete($id)) {
            $this->Session->setFlash(__('会議室タイプが削除されます。', true),'default',array('class'=>CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        $this->Session->setFlash(__('会議室タイプが削除されません。', true),'default',array('class'=>CLASS_ERROR_ALERT));
        $this->redirect(array('action' => 'admin_index'));
    }

}
