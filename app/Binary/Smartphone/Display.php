<?php 

namespace App\Binary\Smartphone;

/**
 * Entity of the disaplay
 *
 * @author Aleksandr Mokrenko <alex.mokrenko@yandex.ru>
*/
class Display 
{	
	private $resolutionX;
	private $resolutionY;
	
	/**
	 * Constructor of display
	 *
	 * @param string $vendor 
	 * @param int $cores 
	 */
	public function __construct($resolutionX, $resolutionY)
	{
		$this->resolutionX = $resolutionX;
		$this->resolutionY = $resolutionY;
	}

	/**
	 * Setter
	 *
	 * @param string $property 
	 * @param int $value 
	 */
	public function __set($property, $value)
	{
		switch ($property)
        	{
            	  case 'resolutionX':
                	$this->resolutionX = $value;
             		break;
            	  case 'resolutiony':
            		$this->resolutionY = $value;
                	break;
        	}
	}

	/**
	 * Getter
	 *
	 * @param string $property 
	 *
	 * @return int 
	 */
	public function __get($property)
	{	
		switch ($property)
        	{
              	  case 'resolutionX':
                	return $this->resolutionX;
              	  case 'resolutionY':
            		return $this->resolutionY;
        	}
	}
	
	public function __toString()
	{
		return $this->resolutionX . "X" . $this->resolutionY . " display";
	}
}

