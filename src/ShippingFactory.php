<?php

namespace Multoo\Shipping;

class ShippingFactory
{

    /**
     *
     * @var \Multoo\Shipping\Provider\ProviderFactory
     */
    protected $providerFactory;

    public function __construct()
    {
        $this->providerFactory = new \Multoo\Shipping\Provider\ProviderFactory();
    }

    /**
     * 
     * @return \Multoo\Shipping\Batch
     */
    public function create()
    {
        return new \Multoo\Shipping\Batch($this->providerFactory);
    }
}
