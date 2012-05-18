<?php
	date_default_timezone_get('Asia/Saigon');
	//echo $this->element('sql_dump');
	$line = array('CSY-RVR-GWK52M78', date('Y'), date('m')-1, date('Y'), date('m'), date('d'), date('H'), date('i'), date('s'),$admin['User']['usercode'] , $admin['User']['fullname']);
	$this->Csv->addRow($line);
	//echo $this->element('sql_dump');
	//debug($list);
	//debug($rs);
	//debug($admin);
	foreach ($list as $rq){
//		if(strpos($rq['Request']['date'], date('m')-1))
//			continue;
		if (empty($rq['Request']) && empty($rq['Phat'])){
			continue;
		}
		$money = 0;
		foreach ($rq['Request'] as $rs){
			if ($rs['status']!=REQUEST_STATUS_APROVED)
				$money += $rs['total_expense'];
			else {
				$money += $rs['request_expense'];
				//$money += $rs['punish_expense'];
			}
		}
        $money += (count($rq['Phat']) * $punish_expense);
		$usercode=$rq['User']['usercode'];		
		$name= $rq['User']['fullname'];
		//$money = $rq[0]['total_price'];
		$address = $rq['User']['address'];
		$phone = $rq['User']['phone'];
		
		
		$line=array($usercode, $name, $money, $address , $phone);
		$this->Csv->addRow($line);
		//debug($line);
	}
	$line = array('END___END___END', date('Y'), date('m')-1);
	$this->Csv->addRow($line);
	$filename = 'RVR-'. date('Y-d',  strtotime($month123));
	echo $this->Csv->render($filename); 
?>