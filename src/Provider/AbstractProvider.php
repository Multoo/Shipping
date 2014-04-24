<?php

namespace Multoo\Shipping\Provider;

abstract class AbstractProvider implements ProviderInterface
{

    protected $decimalSeparator = '.';

    final public function build(\Multoo\Shipping\Batch $batch)
    {
        $shipper = $batch->getShipper();
        $this->decimalSeparator = $batch->decimalSeparator;

        foreach ($batch->getShipments() as $shipment) {
            /* @var $shipment Multoo\Shipping\Shipment */

            if ($shipment->departure === true) {
                $this->processDepartureShipment($shipper, $shipment);
            }
            if ($shipment->return === true) {
                $this->processReturnShipment($shipper, $shipment);
            }
        }

        return $this->processOutput();
    }

    abstract protected function processOutput();

    abstract protected function processDepartureShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment);

    abstract protected function processReturnShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment);
}
