<?php

//このコントローラがユーザの操作を管理する物です。
class UsersController extends AppController {

    var $name = 'Users';
    var $helpers = array('Ajax', 'Js', 'Csv');
    var $uses = array('Company', 'User', 'Request');
    var $components = array('RequestHandler', 'Email');

    /**
     * @var Company
     */
    var $Company;

    /**
     * @var User
     */
    var $User;

    /**
     * @var Request
     */
    var $Request;

    /**
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

    /**
     * @var EmailComponent
     */
    var $Email;

    function beforeFilter() {
    	parent::beforeFilter();
        $this->Auth->allow('register', 'confirm', 'forgotpassword', 'reset');
        $this->Auth->fields = array('username' => 'email', 'password' => 'password');
    }

    //ログイン機能
    function login() {
        //$this->layout = "login";
        $this->set('page', 'login');
        if (!empty($this->data)) {
            if ($this->Auth->login($this->data)) {
                if ($this->Session->read('Auth.User.status') < 1) {
                    $this->Session->destroy();
                    $this->Session->setFlash(__('You have been disable or deleted!', true), 'default', array('class' => CLASS_ERROR_ALERT));
                } else
                    $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Email or password is invalid or not active yet!', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

    //ログアウト機能
    function logout() {
        $this->redirect($this->Auth->logout());
    }

    // セッションを削除する機能
    function reset() {
        $this->Session->destroy();
        $this->redirect(array('action' => 'login'));
    }

    // 登録する機能
    function register() {
        //$this->layout = 'login';
        $this->set('page', 'login');
        $this->Session->destroy();
        $this->set('listCompanies', $this->Company->find('list', array('fiels' => array('id', 'name'))));
        //debug($companies);
        if (!empty($this->data)) {
            if (!Validation::email($this->data['User']['email'])) {
                $this->Session->setFlash(__('Email must be valid format!', true), 'default', array('class' => CLASS_ERROR_ALERT));
            } elseif (!isset($this->data['User']['company_id']) || empty($this->data['User']['company_id'])) {
                $this->Session->setFlash(__('Please select company!', true), 'default', array('class' => CLASS_WARNING_ALERT));
            } else {
                $confirm = $this->Auth->password($this->data['User']['password_confirm']);
                if ($this->data['User']['password'] != $this->Auth->password('')) {
                    if ($this->data['User']['password'] == $confirm) {
                        $this->data['User']['created_time'] = date('Y-m-d H:m:s');
                        $this->data['User']['last_access'] = date('Y-m-d H:m:s');
                        $this->data['User']['role'] = USER_ROLE_NORMAL_USER;
                        $this->data['User']['status'] = USER_STATUS_REGISTERED;
                        $this->data['User']['usercode'] = $this->_genUserCode($this->data['User']['company_id']);
                        $this->User->create();
                        if ($this->User->save($this->data)) {
                            $this->Session->setFlash(__('Thankyou for registed! We will phone to you.', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                            $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                        }
                    } else {
                        $this->Session->setFlash(__('Wrong of your password confirm! Try again', true), 'default', array('class' => CLASS_ERROR_ALERT));
                    }
                } else {
                    $this->Session->setFlash(__('Password must not be blank! Try again', true), 'default', array('class' => CLASS_ERROR_ALERT));
                }
            }
        }
        $this->set('user', $this->data);
    }

    //パスワードを忘れ場合、また新しいパスワードを取得する機能
    function forgotpassword() {
        //$this->layout = 'admin_login';
        //debug($this->data);
        if (!empty($this->data) && $this->data ['User'] ['email'] != '') {
            $email_post = $this->data ['User'] ['email'];
            if (Validation::email($email_post)) {
                $users = &$this->User->find('all', array('fields' => array('User.id', 'User.email', 'User.password'), 'conditions' => array('User.status' => USER_STATUS_ACTIVE, 'User.email' => $this->data ['User'] ['email'])));
                //debug($users);
                $found = 0;
                $password = $this->_genRandomString();
                foreach ($users as $user) {
                    if ($user ['User'] ['email'] == $email_post) {
                        $this->User->id = $user ['User'] ['id'];

                        $this->set('user', $email_post);
                        $this->set('password', $password);
                        $mailInfo = $this->getMailConfig($this->readMailInfo('EmailConfiguration.txt'));
                        //debug($mailInfo);

                        if ($this->admin_sendmail($mailInfo [0], $mailInfo [1], $mailInfo [2], $mailInfo [3], $mailInfo [4], $email_post, 'Recover Lost Password', 'ForgotPasswordEmailTemplate')) {
                            $this->User->saveField('password', $this->Auth->password($password));
                            $this->Session->setFlash(__('Your password have been sent to your email address!', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                            $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                        } else
                            $this->Session->setFlash(__('May be there are errors during sending email!', true), 'default', array('class' => CLASS_ERROR_ALERT));
                        $found = 1;
                        break;
                    }
                }
                if ($found == 0)
                    $this->Session->setFlash(__('Not found your email in database! Try again.', true), 'default', array('class' => CLASS_ERROR_ALERT));
            } else
                $this->Session->setFlash(__('Email must be valid form.', true), 'default', array('class' => CLASS_ERROR_ALERT));
        }
        //		else $this->Session->setFlash('Please input your email!');
    }

    //ランダム文字列を作る機能
    function readMailInfo($filename) {
        $info = array();
        $i = 0;
        $file = 'email templates/' . $filename;
        $lines = count(file($file));
        $fp = fopen($file, 'r');

        while (($content = fgets($fp)) !== false) {
            if (($lines - 1) == $i)
                $info [$i++] = $content;
            else
                $info [$i++] = substr($content, 0, strlen($content) - 1);
        }

        return $info;
        fclose($fp);
    }

    function getMailConfig($mailInfo) {
        $info = array();

        for ($i = 0; $i < count($mailInfo); $i++) {
            $j = 0;
            $j = strpos($mailInfo [$i], "\n");
            if ($j > 0)
                $mailInfo [$i] = substr($mailInfo [$i], 0, $j);
        }
        return $mailInfo;
    }

    function makeFromMail($host, $username) {
        $hostname = substr($host, 4);
        $from = 'Admin < ' . $username . '@' . $hostname . '>';
        return $from;
    }

    function admin_sendmail($host, $username, $password, $port, $timeout, $to, $subject, $template) {
        /* SMTP Options */
        $this->Email->smtpOptions = array('port' => $port, 'timeout' => $timeout, 'host' => $host, 'username' => $username, 'password' => $password,);
        $this->Email->template = $template;
        $this->Email->sendAs = 'both';

        $from = $this->makeFromMail($host, $username);
        $this->Email->from = $username;
        $this->Email->to = $to;
        $this->Email->replyTo = 'noreply';
        $this->Email->subject = $subject;
        $this->Email->delivery = 'smtp';
        //debug($this->Email);
        $result = $this->Email->send();
        return $result;
    }

//アドミンがログインする機能
    function admin_login() {

        //		'recursive' => - 1,
        $this->layout = 'admin_login';
        if (!empty($this->data)) {
            if (isset($this->data ['User'] ['email'])) {
                $user = &$this->User->find('first', array('conditions' => array('User.email' => trim($this->data ['User'] ['email']), 'User.role' => USER_ROLE_ADMIN)));
                //$this->log(debug($user), 'toan');
                if (!empty($user) && ($user ['User'] ['role'] == USER_ROLE_ADMIN)) {
                    if ($this->Auth->login($this->data)) {
                        $this->redirect($this->referer());
                        //$this->redirect('website');
                    } else {
                        $this->Session->setFlash(__('Email or password is invalid.', true), 'default', array('class' => CLASS_ERROR_ALERT));
                    }
                } else {
                    $this->Session->setFlash(__("You don't have permission to login admin.", true), 'default', array('class' => CLASS_ERROR_ALERT));
                    $this->redirect('index');
                }
            } else {
                $this->flash("Your account haven't been found.Please try again.", $this->here);
            }
        }
        //debug($this->data);
    }

//アドミンがログアウトする機能
    function admin_logout() {
        $this->Session->destroy();
        $this->redirect('login');
    }

//アドミンのインでクスページをセットする機能
    function admin_index() {
        $this->layout = 'admin';
        //debug($this->data);
        $conditions = array();
        $conditions['User.role <>'] = USER_ROLE_ADMIN;
        $conditions['User.status <>'] = USER_STATUS_DELETE;
        if (isset($this->data['User']['usercode']) && !empty($this->data['User']['usercode'])) {
            $conditions['User.usercode LIKE'] = '%' . trim($this->data['User']['usercode']) . '%';
        }
        if (isset($this->data['User']['fullname']) && !empty($this->data['User']['fullname'])) {
            $conditions['User.fullname LIKE'] = '%' . trim($this->data['User']['fullname']) . '%';
        }
        if (isset($this->data['User']['phone']) && !empty($this->data['User']['phone'])) {
            $conditions['User.phone LIKE'] = '%' . trim($this->data['User']['phone']) . '%';
        }
        if (isset($this->data['User']['email']) && !empty($this->data['User']['email'])) {
            $conditions['User.email LIKE'] = '%' . trim($this->data['User']['email']) . '%';
        }
        if (isset($this->data['User']['company']) && !empty($this->data['User']['company'])) {
            $conditions['User.company_id'] = (int) $this->data['User']['company'];
        }
        if (isset($this->data['User']['localphone']) && !empty($this->data['User']['localphone'])) {
            $conditions['User.local_phone LIKE'] = '%' . trim($this->data['User']['localphone']) . '%';
        }
        if (isset($this->data['User']['status']) && ($this->data['User']['status'] != '')) {
            $conditions['User.status'] = (int) $this->data['User']['status'];
        }
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'User.created_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
        $sort = $sort == 'type' ? 'role' : $sort;
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->set('listCompanies', $this->Company->find('list', array('fiels' => array('id', 'name'))));
        $this->set('title_for_layout', __('Users Management', true));
        $this->set('rdurl', 'http://localhost/itjp-project/admin/users/index/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('list', $this->paginate('User'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list.ajax');
        }
    }

//アドミンのビューページをセットする機能
    function admin_view($id = null) {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Users Management', true));
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        //TODO : check xem co phai userid co phai cua admin ko?
        $conditions = array('Request.create_by' => $id);
        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'Request.create_time';
        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'desc';
        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
        //$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
        $sort = $sort == 'type' ? 'role' : $sort;
        $this->paginate = array(
            //'fields' => $fields,
            'conditions' => $conditions,
            'limit' => $limit,
            'order' => array($sort => $direction),
            'page' => $page,
            'recursives' => 0
        );
        $this->set('rdurl', 'http://localhost/itjp-project/admin/users/view/' . $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:');
        $this->set('limit', $limit);
        $this->set('user', $this->User->read(null, $id));
        $this->set('list', $this->paginate('Request'));
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            $this->render('list_booked.ajax');
        }
    }

//アドミンの追加ページをセットする機能
    function admin_add() {
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Users Management', true));
        $this->set('listCompanies', $this->Company->find('list', array('fiels' => array('id', 'name'))));
        if (!empty($this->data)) {
            //TODO : check validate data
            if (!Validation::email($this->data['User']['email'])) {
                $this->Session->setFlash(__('Email must be valid format!', true), 'default', array('class' => CLASS_ERROR_ALERT));
            } elseif (!isset($this->data['User']['company']) || empty($this->data['User']['company'])) {
                $this->Session->setFlash(__('Please select company!', true), 'default', array('class' => CLASS_WARNING_ALERT));
            } else {
                $usercode = $this->_genUserCode($this->data['User']['company']);
                $password = $this->_genRandomString();
                $userData = array(
                    'usercode' => trim($usercode),
                    'email' => trim($this->data['User']['email']),
                    'password' => $this->Auth->password($password),
                    'fullname' => trim($this->data['User']['fullname']),
                    'conpany_id' => (int) $this->data['User']['company'],
                    'phone' => trim($this->data['User']['phone']),
                    'local_phone' => trim($this->data['User']['localphone']),
                    'created_time' => date('Y-m-d H-i-s'),
                    'role' => 1,
                    'status' => (int) $this->data['User']['status']
                );
                $this->User->create();
                if ($this->User->save(array('User' => $userData))) {
                    $this->Session->setFlash(__('The user has been saved', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
                    $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true), 'default', array('class' => CLASS_ERROR_ALERT));
            }
        }
    }

//アドミンの編集ページをセットする機能
    function admin_edit($id = null) {

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //TODO : check validate data
            if (!Validation::email($this->data['User']['email'])) {
                $this->Session->setFlash(__('Email must be valid format!', true), 'default', array('class' => CLASS_ERROR_ALERT));
            } elseif (!isset($this->data['User']['company']) || empty($this->data['User']['company'])) {
                $this->Session->setFlash(__('Please select company!', true), 'default', array('class' => CLASS_ERROR_ALERT));
            } else {
                $usercode = $this->_genUserCode($this->data['User']['company']);
                $password = $this->_genRandomString();
                $userData = array(
                    'id' => (int) $id,
                    'usercode' => trim($usercode),
                    'email' => trim($this->data['User']['email']),
                    'password' => $this->Auth->password($password),
                    'fullname' => trim($this->data['User']['fullname']),
                    'conpany_id' => (int) $this->data['User']['company'],
                    'phone' => trim($this->data['User']['phone']),
                    'local_phone' => trim($this->data['User']['localphone']),
                    'created_time' => date('Y-m-d H-i-s'),
                    'role' => 1,
                    'status' => (int) $this->data['User']['status']
                );
                if ($this->User->save(array('User' => $userData))) {
                    $this->Session->setFlash(__('The user has been saved', true), 'default', array('class' => CLASS_ERROR_ALERT));
                    $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true), 'default', array('class' => CLASS_WARNING_ALERT));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
            $this->data['User']['company'] = $this->data['User']['company_id'];
            $this->data['User']['localphone'] = $this->data['User']['local_phone'];
        }
        $this->layout = 'admin';
        $this->set('title_for_layout', __('Users Management', true));
        $this->set('listCompanies', $this->Company->find('list', array('fiels' => array('id', 'name'))));
    }

//アドミンの削除ページをセットする機能
    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        $this->data = $this->User->read(null, $id);
        $this->data['User']['status'] = USER_STATUS_DELETE;
        if ($this->User->save($this->data)) {
            $this->Session->setFlash(__('User deleted', true), 'default', array('class' => CLASS_SUCCESS_ALERT));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true), 'default', array('class' => CLASS_WARNING_ALERT));
        $this->redirect(array('action' => 'index'));
    }

//アドミンの輸出する機能
    function admin_export() {
        $this->layout = 'ajax';
        $this->set('rs', $this->Session->read('result'));
        //$this->redirect('index');
    }

//アドミンの輸入する機能    
    function admin_import() {
        $this->layout = 'flash';
        $path = getcwd();
        //$path= C:\xampp\htdocs\Trunk\app\webroot


        if (!empty($_FILES ['file'] ['name'])) {
            $absolute_path = $path . '\\' . $_FILES ['file'] ['name'];
            move_uploaded_file($_FILES ['file'] ['tmp_name'], $absolute_path);

            App::import("Vendor", "parsecsv");
            $csv = new parseCSV ();
            $file = $absolute_path;
            $csv->auto($file);

            //debug ( $csv->data );


            $data = array();
            $i = 0;
            $row = 0;
            $c = count($csv->data);
            while (true) {
                $status = USER_STATUS_ACTIVE;
                $found = false;
                foreach ($csv->data [$i] as $k => $val) {
                    $key = strtolower($k);

                    switch ($key) {
                        case 'usercode' :
                            $usercode = $csv->data [$i] [$k];
                            break;
                        case 'email' :
                            $email = $csv->data [$i] [$k];
                            break;
                        case 'name' :
                            $name = $csv->data [$i] [$k];
                            break;
                        case 'created time' :
                            if (empty($csv->data [$i] [$k])) {
                                $register_date = date('Y-m-d H:m:s');
                            } else
                                $register_date = $csv->data [$i] [$k];
                            break;
                        case 'last access' :
                            $last_access = $csv->data [$i] [$k];
                            break;
                        case 'status' :
                            if (strtolower($csv->data [$i] [$k]) == 'disable')
                                $status = USER_STATUS_DISABLE;
                            elseif (strtolower($csv->data [$i] [$k]) == 'active')
                                $status = USER_STATUS_ACTIVE;
                            elseif (strtolower($csv->data [$i] [$k]) == 'delete')
                                $status = USER_STATUS_DELETE;
                            elseif (strtolower($csv->data [$i] [$k]) == 'registered')
                                $status = USER_STATUS_REGISTERED;
                            else {

                                $found = true;
                            }
                            break;
                    }
                }

                if (!$found) {
                    $data ['User'] [$row] ['usercode'] = $usercode;
                    $data ['User'] [$row] ['password'] = 'a133cb607700eed8e06cd5ab5a12a482a7834055';
                    $data ['User'] [$row] ['name'] = $name;
                    $data ['User'] [$row] ['email'] = $email;
                    $data ['User'] [$row] ['created_time'] = $register_date;
                    $data ['User'] [$row] ['last_booked'] = $register_date;
                    $data ['User'] [$row] ['last_access'] = $last_access;
                    $data ['User'] [$row] ['status'] = $status;
                    $data ['User'] [$row] ['role'] = USER_ROLE_NORMAL_USER;
                    $row++;
                }
                $i++;
                if ($i == $c)
                    break;
            }

            debug($data);
            $countResult = array();
            //$this->User->save($data['User'][0]);
            $countResult = &$this->User->saveAll($data ['User'], array('atomic' => false));
            //$this->User->updateAll()
            //		debug ( count ( $data ['User'] ) );


            $count = 0;
            for ($i = 0; $i < count($countResult); $i++) {
                if ($countResult [$i] == 1)
                    $count++;
            }
            unlink($absolute_path);
            $this->Session->setFlash(__("Imported successfully $count record(s)", true), 'default', array('class' => CLASS_SUCCESS_ALERT));
        } else
            $this->Session->setFlash(__("You must select a file!", true), 'default', array('class' => CLASS_ERROR_ALERT));
        $this->redirect(array('action' => 'admin_index'));
    }

    private function _genUserCode($companyId = null) {
        if (isset($companyId) && !empty($companyId)) {
            $companyCode = $this->Company->field('code', array('id' => $companyId));
        } else {
            $companyCode = '---';
        }
        $countUser = $this->User->find('count', array('conditions' => array('usercode LIKE' => $companyCode . '%')));
        return sprintf("%s%03d", $companyCode, ++$countUser);
    }

    private function _genRandomString() {
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = '';

        for ($p = 0; $p < $length; $p++) {
            $string .= substr($characters, mt_rand(0, strlen($characters) - 1), 1);
        }

        return $string;
    }

    function view() {
        $this->set('page', 'profile');
        if (!($id = $this->Session->read('Auth.User.id'))) {
            $this->Session->setFlash(__('Invalid user id', true), 'default', array('class' => CLASS_ERROR_ALERT));
            $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
        }
        $this->set('User', $this->User->find('first', array('conditions' => array('User.id' => $id))));
    }

}
