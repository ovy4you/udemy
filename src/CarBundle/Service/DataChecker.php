<?php

namespace CarBundle\Service;


class DataChecker
{
    protected $requireImagesPromoteCar;

    public function __construct($requireImagesPromoteCar)
    {
        $this->requireImagesPromoteCar = $requireImagesPromoteCar;
    }

    public function checkCar($car)
    {
        if($this->requireImagesPromoteCar){
            return $car->getModel();
        }
    }
}