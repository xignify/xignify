<?php
namespace Xignify;

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