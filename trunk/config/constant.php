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
define('REQUEST_STATUS_BOOKED', 1);
define('REQUEST_STATUS_DENY', 2);
define('REQUEST_STATUS_CANCEL_WAITING', 3);
define('REQUEST_STATUS_CANCELED', 4); // Da huy phong
define('REQUEST_STATUS_FINISH', 5); // Da qua ngay dang ky su dung
?>