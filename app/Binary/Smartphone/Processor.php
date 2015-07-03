<?php 

namespace App\Binary\Smartphone\Processor;

/**
 * Entity of the processor
 *
 * @author Aleksandr Mokrenko <alex.mokrenko@yandex.ru>
 */
class Processor 
{	
	private $vendor;
	private $cores;
	
	/**
	 * Constructor of processor
	 *
	 * @param string $vendor 
	 * @param int $cores 
	 */
	public function __construct($vendor, $cores)
	{
		$this->vendor = $vendor;
		$this->cores = $cores;
	}

	/**
	 * Setter
	 *
	 * @param string $vendor 
	 * @param int $cores 
	 */
	public function __set($property, $value)
    {
        switch ($property)
        {
            case 'name':
                $this->vendor = $value;
                break;
            case 'processor':
                $this->cores = $value;
                break;
        }
    }

    public function __get($property)
    {
        switch ($property)
        {
            case 'vendor':
                return $this->vendor;
               
            case 'cores':
               return $this->cores;
        }
    }

    public function __toString()
    {
    	return $this->vendor . " " . $this->cores . "cores ";
    }
}



