<?php

namespace Multoo\Shipping;

class Package
{

    public $weight;
    public $reference1;
    public $reference2;
    public $reference3;
    public $reference4;
    public $reference5;

    public function setWeight($value)
    {
        $this->weight = $value;
        return $this;
    }

    public function setReference1($value)
    {
        $this->reference1 = $value;
        return $this;
    }

    public function setReference2($value)
    {
        $this->reference2 = $value;
        return $this;
    }

    public function setReference3($value)
    {
        $this->reference3 = $value;
        return $this;
    }

    public function setReference4($value)
    {
        $this->reference4 = $value;
        return $this;
    }

    public function setReference5($value)
    {
        $this->reference5 = $value;
        return $this;
    }
}
