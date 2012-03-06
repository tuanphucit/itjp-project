<?php
class RoomTypesController extends AppController {

	var $name = 'RoomTypes';
	var $helpers = array('Ajax', 'Javascript');

	function index() {
		$this->RoomType->recursive = 0;
		$this->set('roomTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid room type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('roomType', $this->RoomType->read(null, $id));
	}

	function add() {
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

	function edit($id = null) {
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

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for room type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RoomType->delete($id)) {
			$this->Session->setFlash(__('Room type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Room type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->RoomType->recursive = 0;
		$this->set('roomTypes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid room type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('roomType', $this->RoomType->read(null, $id));
	}

	function admin_add() {
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
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for room type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RoomType->delete($id)) {
			$this->Session->setFlash(__('Room type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Room type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
