<?php

namespace Multoo\Shipping;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-20 at 11:43:15.
 */
class ShipmentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Shipment
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Shipment;
    }

    protected function tearDown()
    {
        
    }

    /**
     * @covers Multoo\Shipping\Shipment::setReceiver
     */
    public function testSetReceiver()
    {
        $receiver = $this->getMock('\Multoo\Shipping\Receiver');
        $this->object->setReceiver($receiver);
        $this->assertAttributeEquals($receiver, 'receiver', $this->object);
    }

    /**
     * @covers Multoo\Shipping\Shipment::getReceiver
     */
    public function testGetReceiver()
    {
        $receiver = $this->getMock('\Multoo\Shipping\Receiver');

        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('receiver');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, $receiver);

        $this->assertEquals($receiver, $this->object->getReceiver());
    }

    /**
     * @covers Multoo\Shipping\Shipment::addPackage
     */
    public function testAddPackage()
    {
        $package = $this->getMock('\Multoo\Shipping\Package');
        $this->object->addPackage($package);
        $this->assertAttributeEquals([$package], 'packages', $this->object);
    }

    /**
     * @covers Multoo\Shipping\Shipment::getPackages
     */
    public function testGetPackages()
    {
        $package = $this->getMock('\Multoo\Shipping\Package');

        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('packages');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, [$package]);

        $this->assertEquals([$package], $this->object->getPackages());
    }

    /**
     * @covers Multoo\Shipping\Shipment::countPackages
     */
    public function testCountPackages()
    {

        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('packages');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, ['a', 'b']);

        $this->assertEquals(2, $this->object->countPackages());
    }

    /**
     * @covers Multoo\Shipping\Shipment::addDepartureNotification
     */
    public function testAddReturnDepartureNotification()
    {
        $departureNotification = $this->getMock('\Multoo\Shipping\Notification');
        $this->object->addDepartureNotification($departureNotification);
        $this->assertAttributeEquals([$departureNotification], 'departureNotifications', $this->object);
    }

    /**
     * @covers Multoo\Shipping\Shipment::getDepartureNotifications
     */
    public function testGetDepartureNotifications()
    {
        $departureNotification = $this->getMock('\Multoo\Shipping\Notification');

        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('departureNotifications');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, [$departureNotification]);

        $this->assertEquals([$departureNotification], $this->object->getDepartureNotifications());
    }

    /**
     * @covers Multoo\Shipping\Shipment::countDepartureNotifications
     */
    public function testCountDepartureNotifications()
    {
        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('departureNotifications');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, ['a', 'b', 'c']);

        $this->assertEquals(3, $this->object->countDepartureNotifications());
    }

    /**
     * @covers Multoo\Shipping\Shipment::addReturnNotification
     */
    public function testAddReturnReturnNotification()
    {
        $returnNotification = $this->getMock('\Multoo\Shipping\Notification');
        $this->object->addReturnNotification($returnNotification);
        $this->assertAttributeEquals([$returnNotification], 'returnNotifications', $this->object);
    }

    /**
     * @covers Multoo\Shipping\Shipment::getReturnNotifications
     */
    public function testGetReturnNotifications()
    {
        $returnNotification = $this->getMock('\Multoo\Shipping\Notification');

        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('returnNotifications');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, [$returnNotification]);

        $this->assertEquals([$returnNotification], $this->object->getReturnNotifications());
    }

    /**
     * @covers Multoo\Shipping\Shipment::countReturnNotifications
     */
    public function testCountReturnNotifications()
    {
        $reflectionOffObject = new \ReflectionClass($this->object);
        $reflectionProperty = $reflectionOffObject->getProperty('returnNotifications');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($this->object, ['a', 'b', 'c']);

        $this->assertEquals(3, $this->object->countReturnNotifications());
    }
}