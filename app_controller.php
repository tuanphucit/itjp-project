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
require_once 'config/constant.php';

class AppController extends Controller {

    var $components = array('Auth', 'Session', 'P28n', 'RequestHandler');

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    /**
     * @var AuthComponent
     */
    var $Auth;

    /**
     * @var SessionComponent
     */
    var $Session;

    function beforeFilter() {
        //debug($this->Auth->allowedActions);
        $this->Auth->fields = array('username' => 'email', 'password' => 'password');
        $this->Auth->userModel = 'User';
        $this->Auth->autoRedirect = false;
        if (substr($this->action, 0, 6) == 'admin_') {
            $this->Auth->userScope = array(
                'User.role' => USER_ROLE_ADMIN,
                'User.status' => USER_STATUS_ACTIVE
            );
            $this->layout = 'admin';
            $this->Auth->loginRedirect = array('controller' => 'statistic', 'action' => 'admin_chart');
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'admin_login');
            if (!in_array($this->action, $this->Auth->allowedActions) && $this->Session->read('Auth.User.role') != USER_ROLE_ADMIN) {
                $this->Session->setFlash('Ban phai dang nhap voi quyen admin', 'default', array('class' => CLASS_ERROR_ALERT));
                $this->redirect(array('controller' => 'users', 'action' => 'admin_login'));
            }
        } else {
            $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
            $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
        }
    }

}

