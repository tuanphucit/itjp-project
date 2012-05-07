<?php
//TODO : hien tai ko can
/**
 * @property PosOfEquip $PosOfEquip
 * @property Equip $Equip
 * @property Room $Room
 */
class PosOfEquipsController extends AppController {

    var $name = 'PosOfEquips';
    var $helpers = array('Ajax', 'Javascript', 'Time');
    var $uses = array('PosOfEquip', 'Equip', "Room");

    function BeforeFilter() {
        parent::beforeFilter();
    }

    function admin_index() {
        $this->PosOfEquip->recursive = 0;
        $this->set('PosOfEquips', $this->paginate());
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('設備の位置が正しくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('PosOfEquip', $this->PosOfEquip->read(null, $id));
    }

    function admin_move($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('設備の位置が正しくないです。', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->PosOfEquip->save($this->data)) {
                $this->Session->setFlash(__('設備の位置が保存されます。', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('設備の位置が保存されできません。もう一度、お願いします。', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->PosOfEquip->read(null, $id);
        }
    }

}
