<?php
	date_default_timezone_set('Asia/Saigon');
	
	$line = array('#', 'Id', 'UserCode', 'Email', 'Name', 'Company', 'Phone','Create_Time','Last_Booked' , 'Last_Access');
	$this->Csv->addRow($line);
	//debug($rs);
	//$status_option = array(REGISTER_STATUS =>'Registered', ACTIVE_STATUS => 'Active', DISABLE_STATUS =>'Disable');
	//$type_option = array(FREE_TYPE=>'Free', PAYMENT_TYPE=>'Payment');
	$i=1;
	foreach ($rs as $user){
		$id=$user['User']['id'];
		$usercode=$user['User']['usercode'];
		$email = $user['User']['email'];		
		$name= $user['User']['fullname'];
		$company = $user['User']['company_id'];
		$phone = $user['User']['phone'];
		$create_time = $user['User']['created_time'];
		$last_booked = $user['User']['last_booked'];
		$last_access = $user['User']['last_access'];
		$line=array($i,$id, $usercode ,$email , $name , $company , $phone , $create_time , $last_booked , $last_access);
		$this->Csv->addRow($line);
		$i++;
	}	
	$filename = 'users_'. date('Ymd');
	echo $this->Csv->render($filename); 
?>