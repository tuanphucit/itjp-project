<?php

class WebConfig extends AppModel {

    var $name = 'WebConfig';

    /**
     * Get List Time
     * @return array
     */
    function getTimeList() {
        $webConfig = $this->readWebConfig(array('id', 'begin_work_time AS begin', 'end_work_time AS end', 'time_unit AS unit'));
        $begin = DateTime::createFromFormat('H:i:s', $webConfig['begin']);
        $end = DateTime::createFromFormat('H:i:s', $webConfig['end']);
        $unit = new DateInterval($webConfig['unit']);
        $end->add(new DateInterval('P0DT1S'));
        $period = new DatePeriod($begin, $unit, $end);
        $re = array();
        foreach ($period as $dt) {
            $re[$dt->format("H:i:s")] = $dt->format("H:i");
        }
        return $re;
    }

    /**
     * Read Web config from database
     * @param mixed $fields String of single fieldname or array of fieldnames
     * @return array
     */
    function readWebConfig($fields = null) {
        $re = $this->find('first', array(
            'conditions' => array('id' => 1),
            'fields' => $fields
                ));
        if (count($re) == 0) {
            throw new Exception('Web Config not exist!');
        }
        return $re['WebConfig'];
    }

    /**
     * Save Web config from database
     * @param array $data String of single fieldname or array of fieldnames
     * @return boolean
     */
    function saveWebConfig($data = array()) {
        $data['WebConfig']['id'] = 1;
        return $this->save($data);
    }

}
