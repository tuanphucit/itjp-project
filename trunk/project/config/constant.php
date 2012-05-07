<?php
// User
define('USER_ROLE_ADMIN', 0);
define('USER_ROLE_NORMAL_USER', 1);

define('USER_STATUS_DELETE', -1);
define('USER_STATUS_DISABLE', 0);
define('USER_STATUS_ACTIVE', 1);
define('USER_STATUS_REGISTERED', 2);

define('USER_WS_CRITICAL_BAD', -1);
define('USER_WS_CRITICAL_NORMAL', 0);
define('USER_WS_CRITICAL_GOOD', 1);


//REQUEST
define('REQUEST_STATUS_INIT', 0);
define('REQUEST_STATUS_APROVED', 1);
define('REQUEST_STATUS_DENIED', 2);
define('REQUEST_STATUS_HAS_UPDATED', 3);
define('REQUEST_STATUS_CANCELED', 4); // Da huy phong
define('REQUEST_STATUS_FINISH', 5); // Da qua ngay dang ky su dung

define('REQUEST_DETAIL_STATUS_INIT', 0);
define('REQUEST_DETAIL_STATUS_APROVED', 1);
define('REQUEST_DETAIL_STATUS_DENIED', 2);
define('REQUEST_DETAIL_STATUS_HAS_UPDATED', 3);
define('REQUEST_DETAIL_STATUS_CANCELED', 4); // Da huy phong
define('REQUEST_DETAIL_STATUS_FINISH', 5); // Da qua ngay dang ky su dung

define('CLASS_ERROR_ALERT', 'alert_error');
define('CLASS_INFO_ALERT', 'alert_info');
define('CLASS_WARNING_ALERT', 'alert_warning');
define('CLASS_SUCCESS_ALERT', 'alert_success');
?>