<?php
namespace Xignify\Example;

class FrontPage extends \Xignify\Controller {

	public function __fromGet () {

		echo "Hello World :D";

	}
	public function __render( $output ) {
		$ret = \Xignify\View::render( "header.html");
		$ret .= $output;
		$ret .= \Xignify\View::render( "footer.html");

		return $ret;

	}

}