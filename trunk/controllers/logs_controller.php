<?php
class LogsController extends AppController {

	var $name = 'Logs';
	var $helpers = array('Ajax', 'Javascript', 'Time');

	function beforeFilter(){}
	function index() {
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid log', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('log', $this->Log->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Log->create();
			if ($this->Log->save($this->data)) {
				$this->Session->setFlash(__('The log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid log', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Log->save($this->data)) {
				$this->Session->setFlash(__('The log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Log->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for log', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Log->delete($id)) {
			$this->Session->setFlash(__('Log deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Log was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid log', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('log', $this->Log->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Log->create();
			if ($this->Log->save($this->data)) {
				$this->Session->setFlash(__('The log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid log', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Log->save($this->data)) {
				$this->Session->setFlash(__('The log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The log could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Log->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for log', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Log->delete($id)) {
			$this->Session->setFlash(__('Log deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Log was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
