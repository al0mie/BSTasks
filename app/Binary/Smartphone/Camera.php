<?php 

namespace App\Binary\Battery;

/**
 * Entity of the camera
 *
 * @author Aleksandr Mokrenko <alex.mokrenko@yandex.ru>
*/
class Camera
{
  	private $pixels;

  	/**
  	 * Contructor for the camera
  	 *
  	 * @param double $pixels 
  	 */
  	public function __construct($pixels)
  	{
  		this->pixels = $pixels;
  	}

  	/**
  	 * Getter for the camera
  	 *
  	 * @return [type] [description]
  	 */
  	public function __get()
  	{
  		return $this->pixels;
  	}

  	/**
  	 * Setter for the camera
  	 */
  	public function __set($pixels)
  	{
  		this->pixels = $pixels;
  	}
}
