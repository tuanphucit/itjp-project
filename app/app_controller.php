<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
var $components = array('Auth','Session');

	function beforeFilter() {
		$this->Auth->fields = array ('username' => 'email', 'password' => 'password' );
		
		$isUser = $this->Session->read('isUser');
		
		//debug($this->params);
		if(isset($this->params['admin'])){
			if ($isUser){
				$this->Session->destroy();
				
			}
			$isUser = false;
			$this->layout = 'admin';
			$this->Session->write('isUser', false);
			
			$this->Auth->userScope = array('User.user_type'=>0);
			
			$this->Auth->autoRedirect = true;
			$this->Auth->loginRedirect = array('controller'=>'users','action'=>'admin_dashboard');
		}
		else {
			if (!$isUser){
				$this->Session->destroy();
				
			}
			
			$status = $this->Session->read('Auth.User.status');
			if (isset($status) && $status < 1){
				$this->Session->destroy();
				$this->Session->setFlash('You have been disable or deleted!');
			}
			elseif (isset($status) && $status >= 2 ){
				$this->Auth->allow = 'confirm';
				$this->Session->destroy();
				$this->Session->setFlash('You must active first! Please login your email and confirm!');
			}
			
			
			$isUser = true;
			$this->Session->write('isUser', true);
			$this->Auth->userScope = array('User.user_type >'=>0);
			
			$this->Auth->autoRedirect = true;
			$this->Auth->loginRedirect = array('controller'=>'users','action'=>'dashboard');
		}
		
		
		
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		
	}
}

