<?php

$protocol = 'http://';
if(isset($_SERVER['HTTPS'])){
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'httpss://' : 'http://';
}
define('PREFIX', '/Startweb3tpe/');
define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . PREFIX);
define ('PASS_SALT', 'xyz234@');