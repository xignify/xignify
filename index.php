<?php
namespace Xignify;

define("__ROOT__", __DIR__);
define("__DEBUG__", true);

$loader = require "vendor/autoload.php";


switch( $args[0] ) {
	case "." :
		$fa = Controller::factory("Xignify\\Example\\FrontPage");
		break;
	default :
		Error::page(404);
}

$fa->next( $args );

exit;