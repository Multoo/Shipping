<?php

namespace Multoo\Shipping;

class ShippingFactory
{

    /**
     *
     * @var \Auryn\Provider
     */
    protected $injector;

    /**
     * 
     * @param \Auryn\Provider $injector
     */
    public function __construct(\Auryn\Provider $injector)
    {
        $this->injector = $injector;

        // niet de mooiste oplossing maar anders worden elke keer alle services
        // opnieuw gemaakt dit kan op termijn op overzichts pagina's nogal uit
        // de hand lopen.
        $injector->share($this);
    }

    /**
     * 
     * @return \Multoo\Shipping\Batch
     */
    public function create()
    {
        return $this->injector->make('\\Multoo\\Shipping\\Batch');
    }
}
