<?php 

namespace App\Binary\Smartphone\Battery;

/**
 * Entity of the memory 
 * 
 * @author Aleksandr Mokrenko <alex.mokrencko@yandex.ru>
*/
class Battery 
{

	private $capacity;

	/**
	 * constructor for capacity
	 *
	 * @param [type] $capacity [description]
	 */
	public function __construct($capacity)
	{
		$this->capacity = $capacity;
	}

	/**
	 * getter for capacity
	 *
	 * @return int 
	 */
	 public function __get($capacity)
    {
        return $this->capacity;
    }

    /**
     * setter for capacity
     *
     * @param int $capacity 
     */
    public function __set($capacity, $value)
    {
        $this->capacity = $value;
    }

    /**
     * String format for battery
     *
     * @return string 
     */
    public function __toString()
    {
    	return "battery capacity" . $this->$capacity . "mAh ";
    }
}