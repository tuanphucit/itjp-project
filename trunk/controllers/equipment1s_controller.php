<?php 
date_default_timezone_set('Asia/Saigon');
class Equipment1sController extends AppController{
	var $name = "Equipment1s";
	
	function BeforeFilter(){
		$this->Auth->allow('index','add','delete','view','edit');
	}
	
	function index(){
		$this->set('equipment1s',$this->Equipment1->find('all'));
	}
	
	function view($id){
		$this->Equipment1->id = $id;
		$this->set('equipment1s', $this->Equipment1->read());
	}
	
	function add(){
		if(!empty($this->data)){
			$this->data['Equipment1']['start_time'] = date ('Y-m-d H:i:s');
			$this->Equipment1->save($this->data);
			$this->redirect('index');
		}
	}
	
	function delete( $id ){
		$this->Equipment1->delete($id);
		$this->redirect('index');
	}
	
	function edit($id = null) {
		$this->Equipment1->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Equipment1->read();
		} else {
			$this->data['Equipment1']['start_time'] = date ('Y-m-d H:i:s');
			if ($this->Equipment1->save($this->data)) {
				$this->Session->setFlash('Your equipment has been updated.');
				$this->redirect('index');
			}
		}
	}
}
?>