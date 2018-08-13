<?php

function elog($msg) {
	if(is_array($msg)) {
        $msg = print_r($msg, true);
    }
    $bt =  debug_backtrace();
	log_message('error', $bt[0]['file'] . ' line  '. $bt[0]['line'] . ": \n" . $msg);	
}

function pwd_hash($passowrd) {
	return md5('$#@'.$password.'@#@#');
}