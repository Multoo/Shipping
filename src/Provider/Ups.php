<?php

namespace Multoo\Shipping\Provider;

use Multoo\Shipping\Notification;
use Multoo\Shipping\Package;

class Ups extends AbstractProvider
{

    const INITIAL_STRING = '<?xml version="1.0" encoding="UTF-8"?>
        <Shipments xmlns="http://www.ups.com/XMLSchema/CT/WorldShip/ImpExp/ShipmentImport/v1_0_0">
        </Shipments>';

    /**
     * @var SimpleXMLElement
     */
    protected $xml;

    public function __construct()
    {
        $this->xml = simplexml_load_string(self::INITIAL_STRING);
    }

    public function processOutput()
    {
        $dom = new \DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->xml->asXML());
        return $dom->saveXML();
    }

    protected function processReceiverOrShipper(\SimpleXMLElement &$xmlElmnt, $contact)
    {
        $xmlElmnt->addChild('CustomerID', $contact->id);
        $xmlElmnt->addChild('CompanyOrName', $contact->companyName);
        $xmlElmnt->addChild('Attention', $contact->contactName);
        $xmlElmnt->addChild('Address1', $contact->address);
        $xmlElmnt->addChild('CountryTerritory', $contact->isoCountryCode);
        $xmlElmnt->addChild('PostalCode', $contact->zipCode);
        $xmlElmnt->addChild('CityOrTown', $contact->cityName);
        $xmlElmnt->addChild('Telephone', $contact->phone);
    }

    protected function processPackages(\SimpleXMLElement &$xmlElmnt, $packages)
    {
        foreach ($packages as $package) {
            /* @var $packages Package */
            $packageXmlElmnt = $xmlElmnt->addChild('Package');
            $packageXmlElmnt->addChild('PackageType', 'CP');
            $packageXmlElmnt->addChild('Weight', number_format($package->weight, 2, $this->decimalSeparator, ''));

            if (!empty($package->reference1) || !empty($package->reference2) || !empty($package->reference3) ||
                !empty($package->reference4) || !empty($package->reference5)) {
                $refNumXmlElmnt = $packageXmlElmnt->addChild('ReferenceNumbers');

                for ($i = 1; $i <= 5; $i++) {
                    if (!empty($package->{'reference' . $i})) {
                        $refNumXmlElmnt->addChild('Reference' . $i, $package->{'reference' . $i});
                    }
                }
            }
        }
    }

    protected function processNotiRecipients(\SimpleXMLElement &$xmlElmnt, $notifications)
    {
        $count = 0;
        foreach ($notifications as $notification) {
            $count++;
            /* @var $notification Notification */
            $notificationXmlElmnt = $xmlElmnt->addChild('Recipient' . $count);
            $notificationXmlElmnt->addChild('CompanyOrName', $notification->companyOrName);
            $notificationXmlElmnt->addChild('ContactName', $notification->contactName);
            $notificationXmlElmnt->addChild('Email', $notification->email);

            if ($notification->exception === true) {
                $notificationXmlElmnt->addChild('ExceptionNotification', 'Y');
            }
            if ($notification->shipOrReturn === true) {
                $notificationXmlElmnt->addChild('ShipOrReturnNotification', 'Y');
            }
            if ($notification->inTransit === true) {
                $notificationXmlElmnt->addChild('InTransitNotification', 'Y');
            }
            if ($notification->labelCreation === true) {
                $notificationXmlElmnt->addChild('LabelCreationNotification', 'Y');
            }
            if ($notification->delivery === true) {
                $notificationXmlElmnt->addChild('DeliveryNotification', 'Y');
            }
        }
    }

    /**
     * 
     * @param \Multoo\Shipping\Shipper $shipper
     * @param \Multoo\Shipping\Shipment $shipment
     * @return SimpleXMLElmnt
     */
    protected function processShipmentBasics(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment)
    {
        $shipmentXmlElmnt = $this->xml->addChild('Shipment');

        $receiverXmlElmnt = $shipmentXmlElmnt->addChild('ShipTo');
        $shipperXmlElmnt = $shipmentXmlElmnt->addChild('ShipFrom');
        $shipmentInfoXmlElmnt = $shipmentXmlElmnt->addChild('ShipmentInformation');

        $this->processReceiverOrShipper($receiverXmlElmnt, $shipment->getReceiver());
        $this->processReceiverOrShipper($shipperXmlElmnt, $shipper);

        // Shipment Information Xml Elmnt
        $shipmentInfoXmlElmnt->addChild('ShipperNumber', $shipper->id);
        $shipmentInfoXmlElmnt->addChild('ServiceType', 'ST');
        $shipmentInfoXmlElmnt->addChild('BillingOption', 'PP');
        $shipmentInfoXmlElmnt->addChild('NumberOfPackages', $shipment->countPackages());
        $shipmentInfoXmlElmnt->addChild('DescriptionOfGoods', $shipment->descriptionOfGoods);

        return $shipmentXmlElmnt;
    }

    protected function processDepartureShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment)
    {
        $shipmentXmlElmnt = $this->processShipmentBasics($shipper, $shipment);

        $packagesXmlElmnt = $shipmentXmlElmnt->addChild('Packages');
        $this->processPackages($packagesXmlElmnt, $shipment->getPackages());

        if ($shipment->countDepartureNotifications() > 0) {
            $shipmentOptionsXmlElmnt = $shipmentXmlElmnt->ShipmentInformation->addChild('ShipmentOptions');
            $qvnXmlElmnt = $shipmentOptionsXmlElmnt->addChild('QVN');
            $qvnXmlElmnt->addChild('Option', 'Y');
            $qvnXmlElmnt->addChild('ShipFromCompanyOrName', $shipper->companyName);
            $qvnXmlElmnt->addChild('FailedEmailAddress', $shipment->notificationFailedEmail);
            $qvnXmlElmnt->addChild('IncludeDutiesAndTaxesInMemo', 'N');
            $notifiRecipientsXmlElmnt = $qvnXmlElmnt->addChild('Recipients');
            $this->processNotiRecipients($notifiRecipientsXmlElmnt, $shipment->getDepartureNotifications());
        }
    }

    protected function processReturnShipment(\Multoo\Shipping\Shipper $shipper, \Multoo\Shipping\Shipment $shipment)
    {
        $packages = $shipment->getPackages();
        foreach ($packages as $package) {

            $shipmentXmlElmnt = $this->processShipmentBasics($shipper, $shipment);
            $shipmentXmlElmnt->ShipmentInformation->NumberOfPackages = 1;

            $packagesXmlElmnt = $shipmentXmlElmnt->addChild('Packages');
            $this->processPackages($packagesXmlElmnt, [$package]);

            $shipmentOptionsXmlElmnt = $shipmentXmlElmnt->ShipmentInformation->addChild('ShipmentOptions');

            if ($shipment->countReturnNotifications() > 0) {
                $qvnXmlElmnt = $shipmentOptionsXmlElmnt->addChild('QVN');
                $qvnXmlElmnt->addChild('Option', 'Y');
                $qvnXmlElmnt->addChild('ShipFromCompanyOrName', $shipper->companyName);
                $qvnXmlElmnt->addChild('FailedEmailAddress', $shipment->notificationFailedEmail);
                $qvnXmlElmnt->addChild('IncludeDutiesAndTaxesInMemo', 'N');
                $notifiRecipientsXmlElmnt = $qvnXmlElmnt->addChild('Recipients');
                $this->processNotiRecipients($notifiRecipientsXmlElmnt, $shipment->getReturnNotifications());
            }

            $returnServiceXmlElmnt = $shipmentOptionsXmlElmnt->addChild('ReturnService');
            $returnServiceXmlElmnt->addChild('Option', 'Y');
            $returnServiceXmlElmnt->addChild('Type', 'PRL');
            $returnServiceXmlElmnt->addChild('MerchandiseDescription', $shipment->descriptionOfGoods);
        }
    }
}
