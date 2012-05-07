<?php
	date_default_timezone_set('Asia/Saigon');
	//debug($rs);
	$line = array('CSY-RVR-GWK52M78',date('Y'),date('m')-1,date('Y'),date('m'),8,13,24,38,'Team 09','チーム09');
	$this->Csv->addRow($line);
	//debug($rs);

	foreach ($rs as $request){
		$username=$request['Requester']['fullname'];
		
		//$company = $request['Company']['name'];
		$phone = $request['Requester']['phone'];
		$room = $request['Room']['name'];
		$create_time = $request['Request']['create_time'];
		//$last_booked = $request['User']['last_booked'];
		//$last_access = $request['User']['last_access'];
		$line=array($username ,$phone , $room,$create_time);
		$this->Csv->addRow($line);
		$i++;
	}
	//debug($line);	
	$filename = 'users_'. date('Ymd');
	

	echo $this->Csv->render($filename); 
?>