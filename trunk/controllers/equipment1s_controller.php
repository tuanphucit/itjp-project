<?php 
date_default_timezone_set('Asia/Saigon');
class Equipment1sController extends AppController{
	public $components = array('RequestHandler');
	var $name = "Equipment1s";
	public $layout='admin';
	var $paginate = array( 
        'limit'=> 2, 
        'order'=> array( 
            'Equipment1.id'=> 'asc') 
    ); 
	
	function BeforeFilter(){
		$this->Auth->allow('admin_index','admin_add','admin_delete','admin_view','admin_edit');
	}
	
	function admin_index(){
		$this->set('equipment1s',$this->Equipment1->find('all'));
		$this->set('equipment1s',$this->paginate());
		//s$this->set('equipment1s',$this->paginate());
	}
	
	function admin_view($id){
		$this->Equipment1->id = $id;
		$this->set('equipment1s', $this->Equipment1->read());
	}
	
	function admin_add(){
		if(!empty($this->data)){
			$this->data['Equipment1']['start_time'] = date ('Y-m-d H:i:s');
			if ($this->Equipment1->save($this->data)) {
				$this->Session->setFlash('Your equipment has been added.');
				$this->redirect('index');
			}
		}
	}
	
	function admin_delete( $id ){
		$this->Equipment1->delete($id);
		$this->redirect('index');
	}
	
	function admin_edit($id = null) {
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