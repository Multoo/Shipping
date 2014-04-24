<?php

namespace Multoo\Shipping;

class Notification
{

    public $companyOrName;
    public $contactName;
    public $email;
    public $inTransit = false;
    public $shipOrReturn = false;
    public $exception = false;
    public $delivery = false;
    public $labelCreation = false;

    public function setCompanyOrName($value)
    {
        $this->companyOrName = $value;
        return $this;
    }

    public function setContactName($value)
    {
        $this->contactName = $value;
        return $this;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    public function setInTransit($value)
    {
        $this->inTransit = $value;
        return $this;
    }

    public function setShipOrReturn($value)
    {
        $this->shipOrReturn = $value;
        return $this;
    }

    public function setException($value)
    {
        $this->exception = $value;
        return $this;
    }

    public function setDelivery($value)
    {
        $this->delivery = $value;
        return $this;
    }

    public function setLabelCreation($value)
    {
        $this->labelCreation = $value;
        return $this;
    }
}
