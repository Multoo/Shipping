<?php

namespace Multoo\Shipping;

use Multoo\Shipping\Notification;
use Multoo\Shipping\Package;
use Multoo\Shipping\Receiver;

class Shipment
{

    public $departure = true;
    public $return = false;
    public $descriptionOfGoods;
    public $notificationFailedEmail;

    /**
     *
     * @var Receiver
     */
    protected $receiver;

    /**
     * Array of packess (\Multoo\Shipping\Package)
     * @var array 
     */
    protected $packages = array();

    /**
     * Array of notifications (\Multoo\Shipping\Notification)
     * @var array 
     */
    protected $departureNotifications = array();

    /**
     * Array of retrun notifications (\Multoo\Shipping\Notification)
     * @var array 
     */
    protected $returnNotifications = array();

    /**
     * 
     * @param Receiver $receiver
     */
    public function setReceiver(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * 
     * @return Receiver
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * 
     * @param Package $package
     */
    public function addPackage(Package $package)
    {
        $this->packages[] = $package;
    }

    /**
     * 
     * @return array
     */
    public function getPackages()
    {
        return $this->packages;
    }

    public function countPackages()
    {
        return count($this->packages);
    }

    /**
     * 
     * @param Notification $notification
     */
    public function addDepartureNotification(Notification $notification)
    {
        $this->departureNotifications[] = $notification;
    }

    /**
     * 
     * @return array
     */
    public function getDepartureNotifications()
    {
        return $this->departureNotifications;
    }

    public function countDepartureNotifications()
    {
        return count($this->departureNotifications);
    }

    /**
     * 
     * @param Notification $notification
     */
    public function addReturnNotification(Notification $notification)
    {
        $this->returnNotifications[] = $notification;
    }

    /**
     * 
     * @return array
     */
    public function getReturnNotifications()
    {
        return $this->returnNotifications;
    }

    public function countReturnNotifications()
    {
        return count($this->returnNotifications);
    }
}
