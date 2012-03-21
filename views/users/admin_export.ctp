<?php
	date_default_timezone_set('Asia/Saigon');
	
	$line = array('#', 'UserCode', 'Email', 'Name', 'Company', 'Phone', 'Status', 'Created Time','Last Booked' , 'Last Access');
	$this->Csv->addRow($line);
	//debug($rs);
	
	$i=1;
	foreach ($rs as $user){
		$usercode=$user['User']['usercode'];
		$email = $user['User']['email'];		
		$name= $user['User']['fullname'];
		$company = $user['Company']['name'];
		$phone = $user['User']['phone'];
		$status = $user['User']['status'];
		$create_time = $user['User']['created_time'];
		$last_booked = $user['User']['last_booked'];
		$last_access = $user['User']['last_access'];
		$line=array($i, $usercode ,$email , $name , $company , $phone , $status, $create_time , $last_booked , $last_access);
		$this->Csv->addRow($line);
		$i++;
	}	
	$filename = 'users_'. date('Ymd');
	echo $this->Csv->render($filename); 
?>