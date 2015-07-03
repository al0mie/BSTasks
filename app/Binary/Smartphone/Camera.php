<?php 

namespace App\Binary\Smartphone\Camera;

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
  		$this->pixels = $pixels;
  	}

  	/**
  	 * Getter for the camera
  	 *
  	 * @return [type] [description]
  	 */
  	public function __get($pixels)
  	{
  		return $this->pixels;
  	}

  	/**
  	 * Setter for the camera
  	 */
  	public function __set($pixels, $value)
  	{
  		$this->pixels = $value;
  	}

    public function toString()
    {
      return $this->pixels . "megapixels camera ";
    }
}
