<?php

class RequestsController extends AppController {

    var $name = 'Requests';
    var $helpers = array('Ajax', 'Javascript');
    var $components = array('RequestHandler');
    var $paginate = array('order' => array('Request.update_time' => 'desc'), 'limit' => '1');

    /**
     * @var Request
     */
    var $Request;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    function index() {
        $this->Request->recursive = 0;
        $this->set('requests', $this->paginate());
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
        $this->Request->find('all');
        $limit = 1;
        if (isset($_REQUEST['rd'])) {
            $limit = (int) $_REQUEST['rd'];
            $this->paginate = array('limit' => $limit);
        }
        $this->set('requests', $this->paginate());
        $this->set('limit', $limit);
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';

            $this->render('/requests/admin_index.ajax');
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
