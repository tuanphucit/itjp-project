<?php 
class EquipmentsController extends AppController{
	var $name = "Equipments";
	
	function BeforeFilter(){
		$this->Auth->allow('index','add','delete','view','edit');
	}
	
	function index(){
		$this->set('equipments',$this->Equipment->find('all'));
	}
	
	function add(){
		if(!empty($this->data)){
			$data['Equipment']=array(
				'start_time' => date ('Y-m-d H:i:s'),
				'code' => $this->data['Equipments']['code'],
				'name'=> $this->data['Equipments']['name'],
				'description' => $this->data['Equipments']['description'],
				'price' => $this->data['Equipments']['price'],
				'quantity' => $this->data['Equipments']['quantity']
			);
			$this->Equipment->save($data);
			$this->redirect('index');
		}
	}
	
	function view($id){
		$this->Equipment->id = $id;
		$this->set('equipment', $this->Equipment->read());
	}
	
	function delete( $id ){
		$this->Equipment->delete($id);
		$this->redirect('index');
	}
	
	function edit($id = null) {
		$this->Equipment->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Equipment->read();
			$data['Equipment']=array(
				'start_time' => date ('Y-m-d H:i:s'),
				'code' => $this->data['Equipments']['code'],
				'name'=> $this->data['Equipments']['name'],
				'description' => $this->data['Equipments']['description'],
				'price' => $this->data['Equipments']['price'],
				'quantity' => $this->data['Equipments']['quantity']
			);
		} else {
			if ($this->Equipment->save($this->data)) {
				$this->Session->setFlash('Your equipment has been updated.');
				$this->redirect('index');
			}
		}
	}
}
?>