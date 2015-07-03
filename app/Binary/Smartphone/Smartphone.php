<?php

namespace App\Binary\Smartphone;

/**
 * Entity of the smartphone
 *
 * @author Aleksandr Mokrenko <alex.mokrenko@yanex.ru>
 */
class Smartphone implements ISmartphone
{
    private $name;
    private $processor;
    private $display;
    private $camera;
    private $battery;

    /**
     * Constructor of the smartphon
     *
     * @param string $name 
     * @param Processor $processor 
     * @param Display $display 
     * @param Camera $camera 
     * @param Battery $battery 
     */
    public function __construct($name,
                                Processor $processor,
                                Display $display,
                                Camera $camera,
                                Battery $battery
                                )
    {
        $this->name = $name;
        $this->processor = $processor;
        $this->display = $display;
        $this->camera = $camera;
        $this->battery = $battery;
        
    }


    public function __set($property, $value)
    {
        switch ($property)
        {
            case 'name':
                $this->name = $value;
                break;
            case 'processor':
                $this->processor = $value;
                break;
            case 'camera':
                $this->camera = $value;
                break;
            case 'battery':
                $this->battery = $value;
                break;
        }
    }

    public function __get($property)
    {
        switch ($property)
        {
            case 'name':
                return $this->name;
               
            case 'processor':
               return $this->processor;
               
            case 'display':
                return $this->display; 

            case 'camera':
                return $this->camera;
                
            case 'battery':
                return $this->battery;
                
        }
    }

    public function __toString()
    {
        return $this->name . ", " .
               $this->processor . ", " . 
               $this->display . ", " . 
               $this->camera . ", " . 
               $this->battery;
    }
}
