<?php
/*
*      Copyright (c) 2014-2016 Chi Hoang 
*      All rights reserved
*/
require_once '/usr/share/php5/PEAR/PHPUnit/Autoload.php';
require_once("nonce.php");
class unittest extends PHPUnit_Framework_TestCase
{ 
	public function testexample1()
  	{
		echo is_object($mynonce);
		$this->expectOutputString(true);		
	}
}
