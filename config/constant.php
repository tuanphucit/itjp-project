<?php
ob_start();
date_default_timezone_set('Asia/Saigon');
// User
define('USER_ROLE_ADMIN', 1);
define('USER_ROLE_NORMAL_USER', 2);

define('USER_STATUS_DELETE', - 1);
define('USER_STATUS_DISABLE', 0);
define('USER_STATUS_ACTIVE', 1);
define('USER_STATUS_REGISTERED', 2);

define('USER_WS_CRITICAL_BAD', - 1);
define('USER_WS_CRITICAL_NORMAL', 0);
define('USER_WS_CRITICAL_GOOD', 1);

//REQUEST
define('REQUEST_STATUS_INIT', 0);
define('REQUEST_STATUS_APROVED', 1);
define('REQUEST_STATUS_DENIED', 2);
define('REQUEST_STATUS_HAS_UPDATED', 3);
define('REQUEST_STATUS_CANCELED', 4); // Da huy phong
define('REQUEST_STATUS_FINISH', 5); // Da qua ngay dang ky su dung


define('CLASS_ERROR_ALERT', 'alert_error');
define('CLASS_INFO_ALERT', 'alert_info');
define('CLASS_WARNING_ALERT', 'alert_warning');
define('CLASS_SUCCESS_ALERT', 'alert_success');

function cmp($a, $b) {
    return strcmp(strtolower($a ['User'] ['fullname']), strtolower($b ['User'] ['fullname']));
}

/**
 * Get Time diff
 * @param string $begin
 * @param string $end
 * @return array
 */
function get_time_diff($begin, $end) {
    if (!$end) {
        $end = time();
    } else {
        $end = strtotime($end);
    }
    $begin = strtotime($begin);
    
    $begin = date('Y-m-d H:i:s', $begin);
    $end = date('Y-m-d H:i:s', $end);
    $d_start = new DateTime($begin);
    $d_end = new DateTime($end);
    $diff = $d_start->diff($d_end);
    // return all data 
    
    return array(
        //'Y' => (int) $diff->format('%Y'),
        //'M' => (int) $diff->format('%m'),
        'D' => (int) $diff->format('%a'),
        'H' => (int) $diff->format('%h'),
        'I' => (int) $diff->format('%i'),
        'S' => (int) $diff->format('%s')
    );
}

?>