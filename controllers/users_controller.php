<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Ajax', 'Javascript');
	var $uses = array('Company', 'User');
	
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
					$this->data ['User'] ['create_time'] = date ( 'Y-m-d H:m:s' );
					$this->data ['User'] ['last_access'] = date ( 'Y-m-d H:m:s' );
					$this->data['User']['role'] = 1;
					$this->data ['User'] ['status'] = 2;
					if ($this->User->save ( $this->data )) {
							
						/*	
						$host = Router::url(array('controller' => 'users', 'action' => 'confirm'), true);
						$link = $host.'?mail='.md5($this->data['User']['email']);
							
						$this->set('user', $this->data['User']['email']);
						$this->set('link', $link);
							
						$mailInfo = $this->getMailConfig($this->readMailInfo('EmailConfiguration.txt'));
						if($this->admin_sendmail($mailInfo[0], $mailInfo[1], $mailInfo[2], $mailInfo[3],
						$mailInfo[4], $this->data['User']['email'], 'Active Acount Request', 'ActiveEmailTemplate'))
						$this->Session->setFlash ( __ ( 'The user has been saved. Please login your email to confirm that!', true ) );
						else {
							$this->Session->setFlash ( __ ( 'Send email not successful!', true ) );
							//debug();
						}
						*/
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
	
	//admin
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
}
