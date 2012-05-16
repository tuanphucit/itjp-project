<?php

//このコントーラがROOMの操作を管理する物です。
class RoomsController extends AppController {
	
	var $name = 'Rooms';
	var $helpers = array ('Ajax', 'Js', 'Html', 'Form' );
	var $components = array ('RequestHandler' );
	var $uses = array ('Room', 'RoomType', 'Request' );
	
	/**
	 * @var Room
	 */
	var $Room;
	
	/**
	 * @var Request
	 */
	var $Request;
	
	/**
	 * @var RoomType
	 */
	var $RoomType;
	
	/**
	 * @var RequestHandlerComponent
	 */
	var $RequestHandler;
	
	function beforeFilter() {
		parent::beforeFilter ();
		$this->Auth->allow ( 'index' );
	}
	
	//会議室インでクスページをセットする機能
	// liet ke tat ca cac phong
	function index() {
		$conditions = array ();
		//debug($this->params);
		if (isset ( $this->params ['url'] ['rt'] )) {
			$conditions ['typeid'] = intval ( $this->params ['url'] ['rt'] );
		}
		$this->paginate = array ('conditions' => $conditions, 'recursives' => 0 );
		$this->set ( 'rooms', $this->paginate ( 'Room' ) );
		
	//        $conditions = array();
	//        $limit = isset($this->params['named']['limit']) ? (int) $this->params['named']['limit'] : 10;
	//        $sort = isset($this->params['named']['sort']) ? $this->params['named']['sort'] : 'Room.name';
	//        $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : 'asc';
	//        $page = isset($this->params['named']['page']) ? (int) $this->params['named']['page'] : 1;
	//        //$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
	//        $this->paginate = array(
	//            //'fields' => $fields,
	//            'conditions' => $conditions,
	//            'limit' => $limit,
	//            'order' => array($sort => $direction),
	//            'page' => $page,
	//            'recursives' => 0
	//        );
	//        $this->set('listRoomTypes', $this->RoomType->find('list', array('fields' => array('id', 'name'))));
	//        $this->set('title_for_layout', __('Rooms Management', true));
	//        $this->set('rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:');
	//        $this->set('limit', $limit);
	//        $this->set('list', $this->paginate('Room'));
	//        if ($this->RequestHandler->isAjax()) {
	//            $this->layout = 'ajax';
	//            $this->render('list.ajax');
	//        }
	}
	
	//会議室の情報を表す機能
	// chi tiet ve phong
	function view($id = null) {
		if (! $id) {
			$this->Session->setFlash ( __ ( '会議室が正しくないです。', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->set ( 'room', $this->Room->read ( null, $id ) );
	}
	
	// tim kiem phog chong
	function find() {
		//$this->layout = 'dhtmlx';
		//debug($this->data);
		$conditions = array ();
		//TODO : xu ly data submit
		if (isset ( $this->data ['Room'] ['type'] ) && ! empty ( $this->data ['Room'] ['type'] )) {
			$conditions ['Room.typeid'] = ( int ) $this->data ['Room'] ['type'];
		}
		if (isset ( $this->data ['Room'] ['seat'] ) && ! empty ( $this->data ['Room'] ['seat'] )) {
			switch (( int ) $this->data ['Room'] ['seat']) {
				case 1 :
					$conditions ['Room.quantity_seat <='] = 10;
					break;
				case 2 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (10, 20 );
					break;
				case 3 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (20, 30 );
					break;
				case 4 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (30, 50 );
					break;
				case 5 :
					$conditions ['Room.quantity_seat >='] = 50;
					break;
				default :
					break;
			}
		}
		//TODO : tim theo thoi gian
		if (isset ( $this->data ['Room'] ['ftime'] ) && ! empty ( $this->data ['Room'] ['ftime'] )) {
		
		}
		if (isset ( $this->data ['Room'] ['ttime'] ) && ! empty ( $this->data ['Room'] ['ttime'] )) {
		
		}
		$limit = isset ( $this->params ['named'] ['limit'] ) ? ( int ) $this->params ['named'] ['limit'] : 10;
		$sort = isset ( $this->params ['named'] ['sort'] ) ? $this->params ['named'] ['sort'] : 'Room.name';
		$direction = isset ( $this->params ['named'] ['direction'] ) ? $this->params ['named'] ['direction'] : 'asc';
		$page = isset ( $this->params ['named'] ['page'] ) ? ( int ) $this->params ['named'] ['page'] : 1;
		//$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
		$this->paginate = array (//'fields' => $fields,
		'conditions' => $conditions, 'limit' => $limit, 'order' => array ($sort => $direction ), 'page' => $page, 'recursives' => 0 );
		$this->set ( 'listRoomTypes', $this->RoomType->find ( 'list', array ('fields' => array ('id', 'name' ) ) ) );
		$this->set ( 'title_for_layout', __ ( '使用していない会議室を検索する', true ) );
		$this->set ( 'rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:' );
		$this->set ( 'limit', $limit );
		$this->set ( 'list', $this->paginate ( 'Room' ) );
		//        if ($this->RequestHandler->isAjax()) {
	//            $this->layout = 'ajax';
	//            $this->render('list_rooms.ajax');
	//        }
	}
	
	function find_iframe() {
		$this->layout = 'dhtmlx';
		//debug($this->data);
		$conditions = array ();
		if (isset ( $this->data ['Room'] ['type'] ) && ! empty ( $this->data ['Room'] ['type'] )) {
			$conditions ['Room.typeid'] = ( int ) $this->data ['Room'] ['type'];
		}
		if (isset ( $this->data ['Room'] ['seat'] ) && ! empty ( $this->data ['Room'] ['seat'] )) {
			switch (( int ) $this->data ['Room'] ['seat']) {
				case 1 :
					$conditions ['Room.quantity_seat <='] = 10;
					break;
				case 2 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (10, 20 );
					break;
				case 3 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (20, 30 );
					break;
				case 4 :
					$conditions ['Room.quantity_seat BETWEEN ? AND ?'] = array (30, 50 );
					break;
				case 5 :
					$conditions ['Room.quantity_seat >='] = 50;
					break;
				default :
					break;
			}
		}
		//TODO : tim theo thoi gian
		if (isset ( $this->data ['Room'] ['ftime'] ) && ! empty ( $this->data ['Room'] ['ftime'] )) {
			//$conditions['RequestDetail']['']
		}
		if (isset ( $this->data ['Room'] ['ttime'] ) && ! empty ( $this->data ['Room'] ['ttime'] )) {
		
		}
		$limit = isset ( $this->params ['named'] ['limit'] ) ? ( int ) $this->params ['named'] ['limit'] : 10;
		$sort = isset ( $this->params ['named'] ['sort'] ) ? $this->params ['named'] ['sort'] : 'Room.name';
		$direction = isset ( $this->params ['named'] ['direction'] ) ? $this->params ['named'] ['direction'] : 'asc';
		$page = isset ( $this->params ['named'] ['page'] ) ? ( int ) $this->params ['named'] ['page'] : 1;
		//$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
		$this->paginate = array (//'fields' => $fields,
		'conditions' => $conditions, 'limit' => $limit, 'order' => array ($sort => $direction ), 'page' => $page, 'recursives' => 0 );
		$this->set ( 'listRooms', $this->Room->find ( 'list', array ('fields' => array ('id', 'name' ) ) ) );
		$this->set ( 'rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:' );
		$this->set ( 'limit', $limit );
		$this->set ( 'list', $this->paginate ( 'Room' ) );
		//        if ($this->RequestHandler->isAjax()) {
	//            $this->layout = 'ajax';
	//            $this->render('list_rooms.ajax');
	//        }
	}
	
	//アドミンのインでクスページをセットする機能
	function admin_index() {
		$this->layout = 'admin';
		//debug($this->data);
		$conditions = array ();
		if (isset ( $this->data ['Room'] ['name'] ) && ! empty ( $this->data ['Room'] ['name'] )) {
			$conditions ['Room.name LIKE'] = '%' . $this->data ['Room'] ['name'] . '%';
		}
		if (isset ( $this->data ['Room'] ['type'] ) && ! empty ( $this->data ['Room'] ['type'] )) {
			$conditions ['Room.typeid'] = ( int ) $this->data ['Room'] ['type'];
		}
		if (isset ( $this->data ['Room'] ['fromqs'] ) && ! empty ( $this->data ['Room'] ['fromqs'] )) {
			$conditions ['Room.quantity_seat >='] = ( int ) $this->data ['Room'] ['fromqs'];
		}
		if (isset ( $this->data ['Room'] ['toqs'] ) && ! empty ( $this->data ['Room'] ['toqs'] )) {
			$conditions ['Room.quantity_seat <='] = ( int ) $this->data ['Room'] ['toqs'];
		}
		if (isset ( $this->data ['Room'] ['fromrf'] ) && ! empty ( $this->data ['Room'] ['fromrf'] )) {
			$conditions ['Room.renting_fee >='] = ( int ) $this->data ['Room'] ['fromrf'];
		}
		if (isset ( $this->data ['Room'] ['torf'] ) && ! empty ( $this->data ['Room'] ['torf'] )) {
			$conditions ['Room.renting_fee <='] = ( int ) $this->data ['Room'] ['torf'];
		}
		$limit = isset ( $this->params ['named'] ['limit'] ) ? ( int ) $this->params ['named'] ['limit'] : 10;
		$sort = isset ( $this->params ['named'] ['sort'] ) ? $this->params ['named'] ['sort'] : 'Room.name';
		$direction = isset ( $this->params ['named'] ['direction'] ) ? $this->params ['named'] ['direction'] : 'asc';
		$page = isset ( $this->params ['named'] ['page'] ) ? ( int ) $this->params ['named'] ['page'] : 1;
		//$fields = array('id', 'order_date', 'update_time', 'user_id', 'customer_name', 'tel', 'sum', 'status');
		$this->paginate = array (//'fields' => $fields,
		'conditions' => $conditions, 'limit' => $limit, 'order' => array ($sort => $direction ), 'page' => $page, 'recursives' => 0 );
		$this->set ( 'listRoomTypes', $this->RoomType->find ( 'list', array ('fields' => array ('id', 'name' ) ) ) );
		$this->set ( 'title_for_layout', __ ( '会議室管理', true ) );
		$this->set ( 'rdurl', 'sort:' . $sort . '/direction:' . $direction . '/limit:' );
		$this->set ( 'limit', $limit );
		$this->set ( 'list', $this->paginate ( 'Room' ) );
		if ($this->RequestHandler->isAjax ()) {
			$this->layout = 'ajax';
			$this->render ( 'list.ajax' );
		}
	}
	
	//アドミンのビューページをセットする機能
	function admin_view($id = null) {
		$this->set ( 'title_for_layout', __ ( '会議室管理', true ) );
		$this->layout = "admin";
		if (! $id) {
			$this->Session->setFlash ( __ ( '会議室が正しくないです。', true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$conditions = array ('PosOfEquip.roomid' => $id );
		$limit = isset ( $this->params ['named'] ['limit'] ) ? ( int ) $this->params ['named'] ['limit'] : 10;
		$sort = isset ( $this->params ['named'] ['sort'] ) ? $this->params ['named'] ['sort'] : 'PosOfEquip.move_time';
		$direction = isset ( $this->params ['named'] ['direction'] ) ? $this->params ['named'] ['direction'] : 'desc';
		$page = isset ( $this->params ['named'] ['page'] ) ? ( int ) $this->params ['named'] ['page'] : 1;
		//$fields = array('User.id', 'User.fullname', 'User.email', 'User.created_time', 'User.last_access', 'User.role');
		$this->paginate = array (//'fields' => $fields,
		'conditions' => $conditions, 'limit' => $limit, 'order' => array ($sort => $direction ), 'page' => $page, 'recursives' => 0 );
		$this->layout = 'admin';
		$this->set ( 'title_for_layout', __ ( '会議室管理', true ) );
		$this->set ( 'rdurl', $id . '/sort:' . $sort . '/direction:' . $direction . '/limit:' );
		$this->set ( 'limit', $limit );
		$this->set ( 'room', $this->Room->read ( null, $id ) );
		$this->set ( 'list', $this->paginate ( 'PosOfEquip' ) );
		if ($this->RequestHandler->isAjax ()) {
			$this->layout = 'ajax';
			$this->render ( 'list_equips.ajax' );
		}
	}
	
	//会議室を追加ページをセットする機能
	function admin_add() {
		$this->set ( 'listRoomTypes', $this->RoomType->find ( 'list', array ('fields' => array ('id', 'name' ) ) ) );
		$this->set ( 'title_for_layout', __ ( '会議室管理', true ) );
		$this->layout = "admin";
		if (! empty ( $this->data )) {
			$this->Room->create ();
			if ($this->Room->save ( $this->data )) {
				$this->Session->setFlash ( __ ( '会議室が保存されます。', true ), 'default', array ('class' => CLASS_SUCCESS_ALERT ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( '会議室が保存されません。もう一度、お願いします。', true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
			}
		}
	}
	
	//会議室を編集ページをセットする機能
	function admin_edit($id = null) {
		$this->set ( 'listRoomTypes', $this->RoomType->find ( 'list', array ('fields' => array ('id', 'name' ) ) ) );
		$this->set ( 'title_for_layout', __ ( '会議室管理', true ) );
		$this->layout = "admin";
		if (! $id && empty ( $this->data )) {
			$this->Session->setFlash ( __ ( '会議室が正しくないです。', true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if (! empty ( $this->data )) {
			
			if (empty ( $this->data ['Room'] ['id'] ) || ! isset ( $this->data ['Room'] ['id'] )) {
				$this->data ['Room'] ['id'] = ( int ) $id;
			}
			if ($this->Room->save ( $this->data )) {
				$this->Session->setFlash ( __ ( '会議室が保存されます。', true ), 'default', array ('class' => CLASS_SUCCESS_ALERT ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( '会議室が保存されません。もう一度、お願いします。', true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
			}
		}
		if (empty ( $this->data )) {
			$this->data = $this->Room->read ( null, $id );
		}
	}
	
	//会議室を削除ページをセットする機能
	function admin_delete($id = null) {
		if (! $id) {
			$this->Session->setFlash ( __ ( '会議室のため、ＩＤが正しくないです。', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$data = $this->Room->find ( 'first', array ('conditions' => array ('Room.id' => $id ) ) );
		//debug($data);
		if (count ( $data ['Request'] ) > 0) {
			$this->Session->setFlash ( __ ( "会議室が使用されます。削除できません。", true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if ($this->Room->delete ( $id )) {
			$this->Session->setFlash ( __ ( '会議室が削除されます。', true ), 'default', array ('class' => CLASS_SUCCESS_ALERT ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->Session->setFlash ( __ ( '会議室が削除されません。', true ), 'default', array ('class' => CLASS_ERROR_ALERT ) );
		$this->redirect ( array ('action' => 'index' ) );
	}
	
	function admin_list_rooms($id = null) {
		$result = array ();
		if ($id) {
			$rooms = $this->Room->find ( 'all', array ('recursive' => - 1, 'fields' => array ('Room.id', 'Room.name' ), 'conditions' => array ('Room.typeid' => $id ) ) );
			
			if (! empty ( $rooms )) {
				$this->set ( 'rooms', $rooms );
			}
		}
		$this->layout = 'ajax';
	
	}
	function list_rooms($id = null) {
		$result = array ();
		if ($id) {
			$rooms = $this->Room->find ( 'all', array ('recursive' => - 1, 'fields' => array ('Room.id', 'Room.name' ), 'conditions' => array ('Room.typeid' => $id ) ) );
			
			if (! empty ( $rooms )) {
				$this->set ( 'rooms', $rooms );
			}
		}
		$this->layout = 'ajax';
	
	}
}
