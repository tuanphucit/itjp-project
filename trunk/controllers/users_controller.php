<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Ajax', 'Javascript', 'Csv');
	var $uses = array('Company', 'User', 'Request');
	var $_limit = 3;
	function beforeFilter(){
		$this->Auth->allow ( 'register', 'confirm', 'forgotpswd', 'reset' );
		$this->Auth->fields = array ('username' => 'email', 'password' => 'password' );
	}
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function login(){
		$this->layout = "login";
		if (! empty ( $this->data )) {
			if ($this->Auth->login ( $this->data )) {
			if ($this->Session->read('Auth.User.status') < 1){
				$this->Session->destroy();
				$this->Session->setFlash('You have been disable or deleted!');
			}
			else
				$this->redirect ( $this->Auth->redirect () );
			} else {
				$this->Session->setFlash ( __ ( 'Email or password is invalid or not active yet!', true ) );
			}
		}
	}
	function logout() {
		$this->redirect ( $this->Auth->logout () );
	}
	// xoa het Session
	function reset() {
		$this->Session->destroy ();
		$this->redirect(array('action' => 'login'));
	}
	
	// dang ki
	function register() {
		$this->layout = 'login';
		$this->Session->destroy();
		
		$companies = $this->Company->find('all');
		$this->set('companies' , $companies);
		//debug($companies);
		
		if (! empty ( $this->data )) {
			$this->User->create ();
			$confirm = $this->Auth->password ( $this->data ['User'] ['password_confirm'] );
			if ($this->data ['User'] ['password']!= $this->Auth->password('')){
				if ($this->data ['User'] ['password'] == $confirm) {
					$this->data ['User'] ['created_time'] = date ( 'Y-m-d H:m:s' );
					$this->data ['User'] ['last_access'] = date ( 'Y-m-d H:m:s' );
					$this->data['User']['role'] = 1;
					$this->data ['User'] ['status'] = 2;
					$company_count = $this->User->find('count', array('condition'=>array('User.company_id'=>$this->data['User']['company_id'])));
					$company_count = $company_count++;
					debug($company_count);
					$company_code = $this->Company->read('code', $this->data['User']['company_id']);
					debug($company_code['Company']['code']);
					
					if ($company_count<9){
						$this->data['User']['usercode']=$company_code['Company']['code'].'00'.$company_count;
					}
					elseif ($company_count<99){
						$this->data['User']['usercode']=$company_code['Company']['code'].'0'.$company_count;
					}
					else{
						$this->data['User']['usercode']=$company_code['Company']['code'].$company_count;
					}

					debug($this->data);
					if ($this->User->save ( $this->data )) {
						
						$this->redirect('index');
					}
					

				} else {
					$this->Session->setFlash ( __ ( 'Wrong of your password confirm! Try again', true ) );
				}
			}
			else{
				$this->Session->setFlash ( __ ( 'Password must not be blank! Try again', true ) );
			}
			//$this->User->save($this->data);
		}
		$this->set ( 'user', $this->data );
	}
	
	/*
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	*/
	function admin_login() {

		//		'recursive' => - 1,
		$this->layout = 'admin_login';
		if (! empty ( $this->data )) {
			if (isset ( $this->data ['User'] ['email'] )) {
				$user = &$this->User->find ( 'first', array ('conditions' => array (
					'User.email' => $this->data ['User'] ['email'],
					'User.role' => 0 ), 
					 'fields' => array ('User.role' ) ) );
				if (! empty ( $user ) && ($user ['User'] ['role'] == 0)) {
					if ($this->Auth->login ( $this->data )) {
						$this->redirect ( $this->referer () );
						//$this->redirect('website');
					} else {
						$this->Session->setFlash ( __ ( 'Email or password is invalid.', true ) );

					}
				} else {
					$this->Session->setFlash ( "You don't accept permission to login admin.");
					$this->redirect ( 'index' );
				}
			} else {
				$this->flash ( "Your account haven't been found.Please try again.", $this->here );
			}

		}
		//debug($this->data);

	}
	
	
	function admin_index() {
		$this->layout = "admin";
		$page = 1;
		if (!empty($this->data['show'])){
			if ($this->data['show']!=0){
				$this->_limit = $this->data['show'];
			}
			
			
			$this->data['User'] = $this->Session->read('search');
			$this->set('show', $this->_limit);
			$this->Session->write('show', $this->_limit);
		}
		else $this->set('show', $this->_limit);
		
		
		$fields = array ('User.id', 'User.email', 'User.create_time', 'User.last_access', 'User.role');
		$group = '';
		if (! empty ( $this->params ['named'] ['page'] )) {
			$page = $this->params ['named'] ['page'];
			$this->data['User'] = $this->Session->read('search');
			if (!empty($this->data['show']))
				$this->_limit = $this->data['show'];
			else 
				$this->_limit = $this->Session->read('show');
		}
		
		//$this->User->Website->unbindModel ( array ('belongsTo' => array ('Category' ), 'hasMany' => array ('Webpage' ) ) );
		if (empty ( $this->data ) ) {
			$this->set ( 'show', $this->_limit );
			//$this->User->recursive = -1;
			$conditions = array ();
			$conditions ['User.role >'] = 0;
			$conditions ['User.status >'] = -1;

			$this->paginate = array ('conditions' => $conditions, 'limit' => $this->_limit );
			$users = &$this->paginate ( 'User' );
			$this->set ( 'users', $users );
			$this->set ( 'data', 0 );
			$this->Session->write ( 'result', $users );
			
			//session for $this->data
			$this->Session->write ('search', $this->data['User']);
		} else {
			
			
			if (array_key_exists('User', $this->data)){
			$from_year = $this->data ['User'] ['from'] ['year'];
			$from_month = $this->data ['User'] ['from'] ['month'];
			$from_day = $this->data ['User'] ['from'] ['day'];

			$to_year = $this->data ['User'] ['to'] ['year'];
			$to_month = $this->data ['User'] ['to'] ['month'];
			$to_day = $this->data ['User'] ['to'] ['day'];

			if (($from_day != null || $from_month != null) && $from_year == null) {
				$this->Session->setFlash ( 'Please select a year of Register Date (from)' );
			} else {
				if ($from_day == null)
				$from_day = '01';
				if ($from_month == null)
				$from_month = '01';
			}

			if (($to_day != null || $to_month != null) && $to_year == null) {
				$this->Session->setFlash ( 'Please select a year of Register Date (to)' );
			} else {
				if ($to_day == null)
				$to_day = '31';
				if ($to_month == null)
				$to_month = '12';
			}
			$from = $from_year . '-' . $from_month . '-' . $from_day . ' 00:00:00';
			//debug($from);
			$to = $to_year . '-' . $to_month . '-' . $to_day . ' 00:00:00';

			$conditions = array ();

			
			if ($this->data ['User'] ['role'] != '') {
				$conditions ['User.role'] = $this->data ['User'] ['role'];
			}
			if ($this->data ['User'] ['status'] != '') {
				$conditions ['User.status'] = $this->data ['User'] ['status'];
			}

			if (strlen ( $from ) == 19) {
				$conditions ['User.create_date >'] = $from;
			}
			if (strlen ( $to ) == 19) {
				$conditions ['User.create_date <'] = $to;
			}
			if ($this->data ['User'] ['email'] != '') {
				$conditions ['User.email LIKE'] = "%" . $this->data ['User'] ['email'] . "%";
			}
			$conditions ['User.role >'] = 0;
			$conditions ['User.status >'] = -1;
			$this->set ( 'data', 0 );

			if ($this->data ['User'] ['website_count'] != '') {
				$this->log ( 'co website count' . $this->data ['User'] ['website_count'] . 'test', 'abc' );
				$group = 'Website.user_id HAVING count = ' . $this->data ['User'] ['website_count'];
				$this->paginate = array ('fields' => $fields, 'conditions' => $conditions, 'group' => $group, 'limit' => $this->_limit );
				$this->set ( 'data', 1 );

				$this->set ( 'users', $this->paginate () );
				$this->Session->write ( 'result', $this->paginate () );
				
				$this->Session->write ('search', $this->data['User']);
			}

			else {
				$this->paginate = array ('conditions' => $conditions, 'limit' => $this->_limit );
				$this->set ( 'users', $this->paginate ( 'User' ) );
				$this->Session->write ( 'result', $this->paginate ( 'User' ) );
				
				$this->Session->write ('search', $this->data['User']);
			}
			}
		}
		
		$this->set ( 'page', $page );
		$this->set ( 'limit', $this->_limit );
		$page = $this->Session->write('page', $page);
		//debug($this->data);
	}

	function admin_view($id = null) {
		$this->layout = 'admin';
		if (! $id) {
			$this->Session->setFlash ( __ ( 'Invalid user', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->set ( 'user', $this->User->read ( null, $id ) );


		$page=1;
		if (! empty ( $this->params ['named'] ['page'] )) {
			$page = $this->params ['named'] ['page'];
		}
		$this->set ( 'page', $page );
		$this->set ( 'limit', $this->_limit );
		
		$this->paginate = array('conditions'=>array('Request.update_by'=>$id));
		$this->set('requests', $this->paginate('Request'));

	}

	function admin_add() {
		$this->layout = 'admin';
		if (! empty ( $this->data )) {
			$this->User->create ();
			if (Validation::email($this->data['User']['email'])){
			if ($this->data ['User'] ['password']!==$this->Auth->password ('')){
				$confirm = $this->Auth->password ( $this->data ['User'] ['confirm'] );
				if ($this->data ['User'] ['password'] == $confirm) {
					$this->data ['User'] ['created_time'] = date ( 'Y-m-d H:m:s' );
					$this->data ['User'] ['last_access'] = date ( 'Y-m-d H:m:s' );
					$this->data ['User'] ['ws_critical'] = 1;
					if ($this->User->save ( $this->data )) {
						$this->Session->setFlash ( __ ( 'The user has been saved', true ) );
						$this->redirect ( array ('action' => 'index' ) );
					}
				} else
				$this->Session->setFlash ( __ ( 'Wrong of your password confirm. Please try again!', true ) );
		
			}
			else $this->Session->setFlash ( __ ( 'Password must not be empty!', true ) );
		}else  $this->Session->setFlash ( __ ( 'Email must be valid format!', true ) );
		}
		


	}
	
	function admin_edit($id = null) {
		$this->layout = 'admin';
		if (! $id && empty ( $this->data )) {
			$this->Session->setFlash ( __ ( 'Invalid user', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if (! empty ( $this->data )) {
			$error = false;
			$page = $this->Session->read('page');
			if ($this->data['User']['status'] == -1){
				$this->admin_delete($id);

				$this->Session->setFlash('User has been deleted!');
				$this->redirect ( 'index' );
				$this->Session->delete('page');
			}
			else{

				$this->data ['User'] ['id'] = $id;
				$this->data['User']['last_access'] = date('Y-m-d H:m:s');

				if (empty($this->data['User']['password_change'])&& empty($this->data['User']['confirm'])){
					$this->data ['User'] ['password'] = $this->Session->read('password');
		
				}
				elseif ($this->data['User']['password_change']==$this->data['User']['confirm']){
					$this->data ['User'] ['password'] = $this->Auth->password($this->data['User']['password_change']);
				}
				else {
					$error = true;
				}
					
				if (!$error){
					$this->data['User']['last_access'] = date('Y-m-d H:m:s');
					//debug($this->data);
					if ($this->User->save ( $this->data )) {
						$this->Session->setFlash ( __ ( 'The user has been saved', true ) );
						$this->redirect ( 'index/page:'.$page );
						$this->Session->delete('page');
					} else {
						$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.', true ) );
					}
				}
				else
					echo $this->Session->setFlash('Password and Confirm Password not math. Try again!');
			}
		}

		$this->data = $this->User->read ( null, $id );
		$this->set('user', $this->User->read(null, $id));
		$this->Session->write('password', $this->data ['User'] ['password']);
		//$this->data ['User'] ['password'] = '';

		$request_count = $this->Request->find('count', array('conditions'=>array('Request.create_by'=>$id)));
		$this->set('numBookings',$request_count);

		$page=1;
		if (! empty ( $this->params ['named'] ['page'] )) {
			$page = $this->params ['named'] ['page'];
		}
		$this->set ( 'page', $page );
		$this->set ( 'limit', $this->_limit );

	}
	/*
	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}
*/
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_export(){
		$this->layout = 'ajax';
		$result = $this->User->find('all');
		$this->log($result,'log');
		$this->set ('rs', $result);
	
	}
}
