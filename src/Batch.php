<?php

namespace Multoo\Shipping;

use Multoo\Shipping\Provider\ProviderFactory;

class Batch
{

    /**
     * Array of receivers (\Multoo\Shipping\Shipment\Receiver)
     * @var array
     */
    protected $shipments = array();

    /**
     *
     * @var Shipper
     */
    protected $shipper;

    /**
     *
     * @var ProviderFactory
     */
    protected $providerFactory;

    /**
     * UPS import will use the local settings so in the Netherlands it will need a ','
     * @var type 
     */
    public $decimalSeparator = '.';

    /**
     * 
     * @param ProviderFactory $providerFactory
     */
    public function __construct(ProviderFactory $providerFactory)
    {
        $this->providerFactory = $providerFactory;
    }

    /**
     * 
     * @param Shipper $shipper
     */
    public function setShipper(Shipper $shipper)
    {
        $this->shipper = $shipper;
    }

    /**
     * 
     * @return Shipper $shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * 
     * @param Shipment $shipment
     */
    public function addShipment(Shipment $shipment)
    {
        $this->shipments[] = $shipment;
    }

    /**
     * 
     * @return array
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * 
     * @param string $provider
     * @return string
     */
    public function build($provider)
    {
        $provider = $this->providerFactory->create($provider);
        return $provider->build($this);
    }
}
