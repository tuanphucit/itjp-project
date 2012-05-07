<?php
	date_default_timezone_get('Asia/Saigon');
	$line = array('CSY-RVR-GWK52M78', date('Y'), date('m')-1, date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'),$admin['User']['usercode'] , $admin['User']['fullname']);
	$this->Csv->addRow($line);
	//echo $this->element('sql_dump');
	//debug($rs);
	//debug($admin);
	foreach ($rs as $rq){
		if(strpos($rq['Request']['date'], date('m')-1))
			continue;
		$usercode=$rq['Requester']['usercode'];		
		$name= $rq['Requester']['fullname'];
		$money = $rq[0]['total_price'];
		$address = $rq['Requester']['email'];
		$phone = $rq['Requester']['phone'];
		
		
		$line=array($usercode, $name, $money, $address , $phone);
		$this->Csv->addRow($line);
	}
	$line = array('END___END___END', date('Y'), date('m')-1);
	$this->Csv->addRow($line);
	$filename = 'RVR-'. date('Y').'-'.date('m');
	echo $this->Csv->render($filename); 
?>