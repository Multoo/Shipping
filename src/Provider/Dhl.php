<?php

namespace Multoo\Shipping\Provider;

use Multoo\Shipping\Package;

class Dhl extends AbstractProvider
{

    const CSV_HEADER = 'Shipper ID;Shipper Account;Shipper Company Name;Shipper Contact Name;Shipper Address 1;Shipper City Name;Shipper Zip;ISO Country;Shipper IATA;Shipper Phone;Receiver Company Name;Receiver Attention;Receiver Address 1;Receiver Zip code;Receiver City;Receiver ISO;Receiver Phone;Shipper Reference;Product Code;Pieces;Total Weight;Always Send Email;Mail Adres;Incoterms';

    protected $output;

    protected function processOutput()
    {
        return self::CSV_HEADER . $this->output . PHP_EOL;
    }

    protected function processDepartureShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment)
    {
        $receiver = $shipment->getReceiver();
        $packages = $shipment->getPackages();

        $notifications = $shipment->getDepartureNotifications();
        if (count($notifications) > 1) {
            throw new \Exception('Only one departure notifications allowed with shipping provider DHL');
        } elseif (count($notifications) === 1) {
            $notification = $notifications[0];
            /* @var $notification \Multoo\Shipping\Notification */

            if ($notification->exception === true || $notification->inTransit === true || $notification->shipOrReturn === true) {
                throw new \Exception('Only notification \'labelCreation\' is allowed with shipping provider DHL');
            }
        }

        foreach ($packages as $package) {
            /* @var $packages Package */

            $reference = $this->referencesToOneLine($package);

            $outputArray = array(
                $shipper->id,
                $shipper->id,
                $shipper->companyName,
                $shipper->contactName,
                $shipper->address,
                $shipper->cityName,
                $shipper->zipCode,
                $shipper->isoCountryCode,
                $shipper->iata,
                $shipper->phone,
                $receiver->companyName,
                $receiver->contactName,
                $receiver->address,
                $receiver->cityName,
                $receiver->zipCode,
                $receiver->isoCountryCode,
                $receiver->phone,
                $reference,
                'A',
                '1',
                round($package->weight),
                isset($notification) && $notification->labelCreation === true ? '1' : '0',
                isset($notification) && $notification->labelCreation === true ? $notification->email : '',
                'CPT'
            );

            $this->output.= PHP_EOL . implode(';', str_replace(';', ':', $outputArray));
        }
    }

    protected function processReturnShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment)
    {
        $receiver = $shipment->getReceiver();
        $packages = $shipment->getPackages();

        $notifications = $shipment->getReturnNotifications();
        if (count($notifications) > 1) {
            throw new \Exception('Only one return notifications allowed with shipping provider DHL');
        } elseif (count($notifications) === 1) {
            $notification = $notifications[0];
            /* @var $notification \Multoo\Shipping\Notification */

            if ($notification->exception === true || $notification->inTransit === true || $notification->shipOrReturn === true) {
                throw new \Exception('Only notification \'labelCreation\' is allowed with shipping provider DHL');
            }
        }

        foreach ($packages as $package) {
            /* @var $packages Package */

            $reference = $this->referencesToOneLine($package);

            $outputArray = array(
                $shipper->id,
                $shipper->id,
                $receiver->companyName,
                $receiver->contactName,
                $receiver->address,
                $receiver->cityName,
                $receiver->zipCode,
                $receiver->isoCountryCode,
                'AMS', // iata code
                $receiver->phone,
                $shipper->companyName,
                $shipper->contactName,
                $shipper->address,
                $shipper->cityName,
                $shipper->zipCode,
                $shipper->isoCountryCode,
                $shipper->phone,
                $reference,
                'A',
                '1',
                round($package->weight),
                isset($notification) && $notification->labelCreation === true ? '1' : '0',
                isset($notification) && $notification->labelCreation === true ? $notification->email : '',
                'CPT'
            );

            $this->output.= PHP_EOL . implode(';', str_replace(';', ':', $outputArray));
        }
    }

    protected function referencesToOneLine(\Multoo\Shipping\Package $package)
    {
        $arrayOfReferences = [];
        for ($i = 1; $i <= 5; $i++) {
            if (!empty($package->{'reference' . $i})) {
                $arrayOfReferences[] = $package->{'reference' . $i};
            }
        }
        return implode(", ", $arrayOfReferences);
    }
}
