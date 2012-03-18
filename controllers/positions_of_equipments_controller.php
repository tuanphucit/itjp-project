<?php
class PositionsOfEquipmentsController extends AppController {

	var $name = 'PositionsOfEquipments';
	var $helpers = array('Ajax', 'Javascript', 'Time');
	var $uses = array('PositionsOfEquipments','Equipment1', "Room");
	
	function BeforeFilter(){
		$this->Auth->allow('index','add','delete','view','edit');
	}
	
	function index() {
		$this->PositionsOfEquipment->recursive = 0;
		$this->set('positionsOfEquipments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid positions of equipment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('positionsOfEquipment', $this->PositionsOfEquipment->read(null, $id));
	}

	function add() {
		$roomids = $this->Room->find('list', array('fields'=>array('Room.id')));
		$equipmentids = $this->Equipment1->find('list', array('fields'=>array('Equipment1.id')));
		$this->set('roomids', $roomids);
		$this->set('equipmentids', $equipmentids);
		if (!empty($this->data)) {
			$this->PositionsOfEquipment->create();
			if ($this->PositionsOfEquipment->save($this->data)) {
				$this->Session->setFlash(__('The positions of equipment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions of equipment could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid positions of equipment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PositionsOfEquipment->save($this->data)) {
				$this->Session->setFlash(__('The positions of equipment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions of equipment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PositionsOfEquipment->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for positions of equipment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PositionsOfEquipment->delete($id)) {
			$this->Session->setFlash(__('Positions of equipment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Positions of equipment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->PositionsOfEquipment->recursive = 0;
		$this->set('positionsOfEquipments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid positions of equipment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('positionsOfEquipment', $this->PositionsOfEquipment->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PositionsOfEquipment->create();
			if ($this->PositionsOfEquipment->save($this->data)) {
				$this->Session->setFlash(__('The positions of equipment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions of equipment could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid positions of equipment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PositionsOfEquipment->save($this->data)) {
				$this->Session->setFlash(__('The positions of equipment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The positions of equipment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PositionsOfEquipment->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for positions of equipment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PositionsOfEquipment->delete($id)) {
			$this->Session->setFlash(__('Positions of equipment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Positions of equipment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
