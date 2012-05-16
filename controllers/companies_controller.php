<?php

class CompaniesController extends AppController {

    var $name = "Companies";
    var $helpers = array('Ajax', 'Js', 'Form', 'Html');
    var $components = array('RequestHandler');

    /**
     * @var Company
     */
    var $Company;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function beforeFilter() {
        parent::beforeFilter();
    }

    function admin_index() {
        //debug($this->params);
        $conditions = array();
        if (isset($this->data['Company']['code']) && !empty($this->data['Company']['code'])) {
            $conditions['Company.code LIKE'] = '%' . $this->data['Company']['code'] . '%';
        }
        if (isset($this->data['Company']['name']) && !empty($this->data['Company']['name'])) {
            $conditions['Company.name LIKE'] = '%' . $this->data['Company']['name'] . '%';
        }
        $limit = isset($this->params['named']['limit']) && !empty($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) && !empty($this->params['named']['sort']) ? $this->params['named']['sort'] : 'name';
        $direction = isset($this->params['named']['direction']) && !empty($this->params['named']['direction']) ? $this->params['named']['direction'] : 'asc';
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
        $this->set('title_for_layout', __('会社管理', true));
        $this->set('rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('Company'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        } else {
            $this->layout = 'admin';
        }
    }

    function admin_add() {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('会社管理', true));
        if (!empty($this->data)) {
            $this->Company->create();
            if ($this->Company->save($this->data)) {
                $this->Session->setFlash(__('会社が保存されています', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash(__('会社が保存されていません。もう一度お願いします。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

    function admin_edit($id) {
        $this->layout = "admin";
        $this->set('title_for_layout', __('会社管理', true));
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('会社が正しくないです。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'admin_index'));
        }
        if (!empty($this->data)) {
            $this->data['Company']['id'] = $id;
            if ($this->Company->save($this->data)) {
                $this->Session->setFlash(__('会社が保存されています', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash(__('会社が保存されていません。もう一度お願いします。', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Company->read(null, $id);
        }
    }

}

?>