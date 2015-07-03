<?php 

namespace App\Binary\Smartphone\Display;

/**
 * Entity of the disaplay
 *
 * @author Aleksandr Mokrenko <alex.mokrenko@yandex.ru>
*/
class Display 
{	
	private $resulutionX;
	private $resolutionY;
	
	/**
	 * Constructor of display
	 *
	 * @param string $vendor 
	 * @param int $cores 
	 */
	public function __construct($resulutionX, $resolutionY)
	{
		$this->resulutionX = $resulutionX;
		$this->resolutionY = $resolutionY;
	}

	public function __set($property, $value)
	{
		switch ($property)
        {
            case 'resulutionX':
                $this->resulutionX = $value;
                break;
            case 'resulutiony':
            	$this->resulutionY = $value;
                break;
        }
	}

	public function __get($property)
	{	
		switch ($property)
        {
            case 'resulutionX':
                return $this->bar;
            case 'resulutionY':
            	return $this->bar;
        }
	}

	public function __toString()
	{
		return $this->resulutionX . "X" . $this->resulutionY . "display ";
	}
}

