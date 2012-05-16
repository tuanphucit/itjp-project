<?php
	$option = array();
	if(isset($rooms) && ! empty($rooms)){
		foreach($rooms as $row){
			$option[$row['Room']['id']] = $row['Room']['name'];
		}
	}
	if(! empty($option)){
		echo $this->Form->select('Request.roomid',$option,null,array('empty' => __('--選択--',true),'style' => 'width:170px','div' => false));
	}
?>