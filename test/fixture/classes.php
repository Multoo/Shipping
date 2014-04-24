<?php

class UpsBatchFixture extends \Multoo\Shipping\Batch
{

    public function __construct()
    {
        $this->setShipper((new \Multoo\Shipping\Shipper)
                ->setId('12345678')
                ->setCompanyName('Test BV')
                ->setContactName('Alex Damen')
                ->setAddress('Westerveen 3A')
                ->setCityName('Nieuwleusen')
                ->setZipCode('7711DA')
                ->setIsoCountryCode('NL')
                ->setPhone('0529484004')
                ->setEmail('alex@test.bv')
        );

        $shipment0 = new \Multoo\Shipping\Shipment();
        $shipment0->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('4654464')
                ->setCompanyName('Scheep BV')
                ->setContactName('Jan Jansen')
                ->setAddress('Street 1A')
                ->setCityName('Somewhere')
                ->setZipCode('1234AS')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485005')
                ->setEmail('Jan@Scheep.bv')
        );
        $shipment0->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1)
                ->setReference1('p0-ref1')
                ->setReference2('p0-ref2')
                ->setReference3('p0-ref3')
                ->setReference4('p0-ref4')
                ->setReference5('p0-ref5')
        );
        $shipment0->return = true;
        $shipment0->descriptionOfGoods = "shipment0-descriptionOfGoods";
        $shipment0->notificationFailedEmail = "shipment0@company.org";
        $shipment0->addDepartureNotification((new \Multoo\Shipping\Notification())
                ->setCompanyOrName('Scheep BV')
                ->setContactName('Jan Jansen')
                ->setEmail('Jan@Scheep.bv')
                ->setDelivery(true)
                ->setException(false)
                ->setInTransit(true)
                ->setLabelCreation(false)
                ->setShipOrReturn(true)
        );
        $shipment0->addReturnNotification((new \Multoo\Shipping\Notification())
                ->setCompanyOrName('Pintip BV')
                ->setContactName('Bas Pintip')
                ->setEmail('bas@pintip.nl')
                ->setDelivery(false)
                ->setException(true)
                ->setInTransit(false)
                ->setLabelCreation(true)
                ->setShipOrReturn(false));
        $this->shipments[0] = $shipment0;

        $shipment1 = new \Multoo\Shipping\Shipment();
        $shipment1->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('35354647')
                ->setCompanyName('Test BV')
                ->setContactName('Henk Tester')
                ->setAddress('Road 732-32')
                ->setCityName('Overthere')
                ->setZipCode('1252HG')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485007')
                ->setEmail('Henk@test.bv')
        );
        $shipment1->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1.25)
        );
        $shipment1->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1.25)
        );
        $shipment1->descriptionOfGoods = "shipment1-descriptionOfGoods";
        $shipment1->notificationFailedEmail = "shipment1@company.com";
        $this->shipments[1] = $shipment1;

        $shipment3 = new \Multoo\Shipping\Shipment();
        $shipment3->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('789342789')
                ->setCompanyName('Heb-ik-jouw-daar BV')
                ->setContactName('Jop Jansen')
                ->setAddress('Straat 19B')
                ->setCityName('Dontknow')
                ->setZipCode('9874KO')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485006')
                ->setEmail('Jop@Heb-ik-jouw-daar.bv')
        );
        $shipment3->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1)
                ->setReference1('p0-ref1')
                ->setReference2('p0-ref2')
                ->setReference3('p0-ref3')
                ->setReference4('p0-ref4')
                ->setReference5('p0-ref5')
        );
        $shipment3->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(2.25)
                ->setReference5('p2-ref5')
        );
        $shipment3->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(5.25)
                ->setReference1('p3-ref1')
                ->setReference2('p3-ref2')
                ->setReference3('p3-ref3')
                ->setReference4('p3-ref4')
        );
        $shipment3->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(3.25)
        );
        $shipment3->departure = false;
        $shipment3->return = true;
        $shipment3->descriptionOfGoods = "shipment3-descriptionOfGoods";
        $shipment3->notificationFailedEmail = "shipment3@company.com";
        $this->shipments[2] = $shipment3;
    }
}

class DhlBatchFixture extends \Multoo\Shipping\Batch
{

    public function __construct()
    {
        $this->setShipper((new \Multoo\Shipping\Shipper)
                ->setId('12345678')
                ->setCompanyName('Test BV')
                ->setContactName('Alex Damen')
                ->setAddress('Westerveen 3A')
                ->setCityName('Nieuwleusen')
                ->setZipCode('7711DA')
                ->setIsoCountryCode('NL')
                ->setPhone('0529484004')
                ->setEmail('alex@test.bv')
        );

        $shipment0 = new \Multoo\Shipping\Shipment();
        $shipment0->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('4654464')
                ->setCompanyName('Scheep BV')
                ->setContactName('Jan Jansen')
                ->setAddress('Street 1A')
                ->setCityName('Somewhere')
                ->setZipCode('1234AS')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485005')
                ->setEmail('Jan@Scheep.bv')
        );
        $shipment0->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1)
                ->setReference1('p0-ref1')
                ->setReference2('p0-ref2')
                ->setReference3('p0-ref3')
                ->setReference4('p0-ref4')
                ->setReference5('p0-ref5')
        );
        $shipment0->return = true;
        $shipment0->addDepartureNotification((new \Multoo\Shipping\Notification())
                ->setCompanyOrName('Scheep BV')
                ->setContactName('Jan Jansen')
                ->setEmail('Jan@Scheep.bv')
                ->setLabelCreation(true)
        );
        $shipment0->addReturnNotification((new \Multoo\Shipping\Notification())
                ->setCompanyOrName('Pintip BV')
                ->setContactName('Bas Pintip')
                ->setEmail('bas@pintip.nl')
                ->setLabelCreation(true)
        );
        $this->shipments[0] = $shipment0;

        $shipment1 = new \Multoo\Shipping\Shipment();
        $shipment1->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('35354647')
                ->setCompanyName('Test BV')
                ->setContactName('Henk Tester')
                ->setAddress('Road 732-32')
                ->setCityName('Overthere')
                ->setZipCode('1252HG')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485007')
                ->setEmail('Henk@test.bv')
        );
        $shipment1->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1.25)
        );
        $shipment1->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1.25)
        );
        $shipment1->descriptionOfGoods = "shipment1-descriptionOfGoods";
        $shipment1->notificationFailedEmail = "shipment1@company.com";
        $this->shipments[1] = $shipment1;

        $shipment2 = new \Multoo\Shipping\Shipment();
        $shipment2->setReceiver((new \Multoo\Shipping\Receiver)
                ->setId('789342789')
                ->setCompanyName('Heb-ik-jouw-daar BV')
                ->setContactName('Jop Jansen')
                ->setAddress('Straat 19B')
                ->setCityName('Dontknow')
                ->setZipCode('9874KO')
                ->setIsoCountryCode('NL')
                ->setPhone('0529485006')
                ->setEmail('Jop@Heb-ik-jouw-daar.bv')
        );
        $shipment2->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(1)
                ->setReference1('p0-ref1')
                ->setReference2('p0-ref2')
                ->setReference3('p0-ref3')
                ->setReference4('p0-ref4')
                ->setReference5('p0-ref5')
        );
        $shipment2->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(2.25)
                ->setReference1('p2-ref1')
                ->setReference2('p2-ref2')
        );
        $shipment2->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(5.25)
                ->setReference1('p3-ref1')
                ->setReference2('p3-ref2')
                ->setReference3('p3-ref3')
                ->setReference4('p3-ref4')
        );
        $shipment2->addPackage((new \Multoo\Shipping\Package)
                ->setWeight(3.25)
        );
        $shipment2->departure = false;
        $shipment2->return = true;
        $this->shipments[2] = $shipment2;
    }

    /**
     * 
     * @param int $nr
     * @return \Multoo\Shipping\Shipment
     */
    public function &getShipment($nr)
    {
        return $this->shipments[$nr];
    }
}
