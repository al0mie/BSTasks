<?php 

namespace App\Binary\Battery;

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
		this->capacity = $capacity;
	}

	/**
	 * getter for capacity
	 *
	 * @return int 
	 */
	 public function __get()
    {
        return $this->capacity;
    }

    /**
     * setter for capacity
     *
     * @param int $capacity 
     */
    public function __set($capacity)
    {
        $this->capacity = $capacity;
    }
}