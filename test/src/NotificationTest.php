<?php

namespace Multoo\Shipping;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-21 at 15:13:25.
 */
class NotificationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Notification
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Notification;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Multoo\Shipping\Notification::setCompanyOrName
     */
    public function testSetCompanyOrName()
    {
        $value = 'tested';
        $this->object->setCompanyOrName($value);
        $this->assertEquals($value, $this->object->companyOrName);
    }

    /**
     * @covers Multoo\Shipping\Notification::setContactName
     */
    public function testSetContactName()
    {
        $value = 'tested';
        $this->object->setContactName($value);
        $this->assertEquals($value, $this->object->contactName);
    }

    /**
     * @covers Multoo\Shipping\Notification::setEmail
     */
    public function testSetEmail()
    {
        $value = 'tested';
        $this->object->setEmail($value);
        $this->assertEquals($value, $this->object->email);
    }

    /**
     * @covers Multoo\Shipping\Notification::setInTransit
     */
    public function testSetInTransit()
    {
        $value = 'tested';
        $this->object->setInTransit($value);
        $this->assertEquals($value, $this->object->inTransit);
    }

    /**
     * @covers Multoo\Shipping\Notification::setShipOrReturn
     */
    public function testSetShipOrReturn()
    {
        $value = 'tested';
        $this->object->setShipOrReturn($value);
        $this->assertEquals($value, $this->object->shipOrReturn);
    }

    /**
     * @covers Multoo\Shipping\Notification::setException
     */
    public function testSetException()
    {
        $value = 'tested';
        $this->object->setException($value);
        $this->assertEquals($value, $this->object->exception);
    }

    /**
     * @covers Multoo\Shipping\Notification::setDelivery
     */
    public function testSetDelivery()
    {
        $value = 'tested';
        $this->object->setDelivery($value);
        $this->assertEquals($value, $this->object->delivery);
    }

    /**
     * @covers Multoo\Shipping\Notification::setLabelCreation
     */
    public function testSetLabelCreation()
    {
        $value = 'tested';
        $this->object->setLabelCreation($value);
        $this->assertEquals($value, $this->object->labelCreation);
    }
}
