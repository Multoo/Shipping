<?php

namespace Multoo\Shipping;

abstract class AbstractContact
{

    public $id;
    public $companyName;
    public $contactName;
    public $address;
    public $cityName;
    public $zipCode;
    public $isoCountryCode = 'NL';
    public $phone;
    public $email;

    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    public function setCompanyName($value)
    {
        $this->companyName = $value;
        return $this;
    }

    public function setContactName($value)
    {
        $this->contactName = $value;
        return $this;
    }

    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }

    public function setCityName($value)
    {
        $this->cityName = $value;
        return $this;
    }

    public function setZipCode($value)
    {
        $this->zipCode = $value;
        return $this;
    }

    public function setIsoCountryCode($value)
    {
        $this->isoCountryCode = $value;
        return $this;
    }

    public function setPhone($value)
    {
        $this->phone = $value;
        return $this;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }
}
