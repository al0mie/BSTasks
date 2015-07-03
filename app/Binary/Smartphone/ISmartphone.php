<?php 

namespace App\Binary\Smartphone;

/**
 * Interface for class Smartphone
 * 
 * @author Aleksandr Mokrenko <alex.mokrencko@yandex.ru>
 */
interface ISmartphone
{
	public function __get($property);
	public function __set($property, $value);
	public function __toString();
}

