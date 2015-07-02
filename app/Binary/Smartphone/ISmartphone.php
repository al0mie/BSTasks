<?php 

namespace App\Binary\ISmartphone;

interface ISmartphone
{
	public function __get($property);
	public function __set($property, $value);
}

