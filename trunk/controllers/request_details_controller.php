<?php
class RequestDetailsController extends AppController {

	var $name = 'RequestDetails';
	var $helpers = array('Ajax', 'Javascript', 'Time');

	function index() {
		$this->RequestDetail->recursive = 0;
		$this->set('requestDetails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid request detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('requestDetail', $this->RequestDetail->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RequestDetail->create();
			if ($this->RequestDetail->save($this->data)) {
				$this->Session->setFlash(__('The request detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request detail could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid request detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RequestDetail->save($this->data)) {
				$this->Session->setFlash(__('The request detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RequestDetail->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for request detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RequestDetail->delete($id)) {
			$this->Session->setFlash(__('Request detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Request detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->RequestDetail->recursive = 0;
		$this->set('requestDetails', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid request detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('requestDetail', $this->RequestDetail->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->RequestDetail->create();
			if ($this->RequestDetail->save($this->data)) {
				$this->Session->setFlash(__('The request detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request detail could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid request detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RequestDetail->save($this->data)) {
				$this->Session->setFlash(__('The request detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RequestDetail->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for request detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RequestDetail->delete($id)) {
			$this->Session->setFlash(__('Request detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Request detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
