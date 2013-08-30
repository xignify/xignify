<?php
function args_init( &$args, $value = 0 ) {
	if ( count($args) == 0 ) { array_push( $args, $value ); }
}


function array_extend( &$default, $added ) {
	//p($added);
	if (!is_array($added)) {
		$default = $added;
		return;
	}
	foreach($added as $k => $v) {
		if ( is_array($v) ) {
			array_extend($default[$k], $v);
		}
		else {
			$default[$k] = $v;
		}
	}
}

/*
 * go( url:string )
 * go location.
 *
 **/

function go( $url ) {
	header("Location:".$url);exit;
}



/*
 * p( val:mixed )
 * view print_r
 *
 **/

function p( $val ) {
	echo "<pre>".str_replace(array("<", ">"), array("&lt;", "&gt;"), print_r($val, true))."</pre>";
}

/*
 *
 *
 **/

function d( $msg ) {
	if ( defined("__DEBUG__") && __DEBUG__ ) {
		echo $msg;
	}
}

/*
 * _unserialize( context:string ):mixed
 * context를 받아서 unserialize 하는데, null은 제거한다.
 *
 **/
function _unserialize( $context ) {
	
	if ( is_null($context) || $context == "" ) return null;
	
	$ret = unserialize($context);
	
	if ($ret === false) return null;
	
	foreach($ret as $k => $v) { if ( is_null($v) ) unset($ret[$k]); }
	
	if ( count($ret) == 0 ) return null;

	return $ret;
	
}


define("HOME",  substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], "/index.php")));

if ( isset( $_SERVER['PATH_INFO'] ) && $_SERVER['PATH_INFO'] !== "/" ) {
	$temp = explode("?", $_SERVER['PATH_INFO']);
	$args = explode( "/", trim($temp[0], "/") );
	if ( $args[0] == "" ) $args[0] = ".";
}
else {
	$args = array( "." );
}

$GLOBALS['args'] = $args;
