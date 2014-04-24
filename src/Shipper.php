<?php

namespace Multoo\Shipping;

class Shipper extends AbstractContact
{

    public $iata = 'AMS'; // DHL specific

    public function setIata($value)
    {
        $this->iata = $value;
        return $this;
    }
}
