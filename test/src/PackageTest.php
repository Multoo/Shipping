<?php

namespace Multoo\Shipping;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-21 at 15:20:23.
 */
class PackageTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Package
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Package;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Multoo\Shipping\Package::setWeight
     */
    public function testSetWeight()
    {
        $value = 'tested';
        $this->object->setWeight($value);
        $this->assertEquals($value, $this->object->weight);
    }

    /**
     * @covers Multoo\Shipping\Package::setReference1
     */
    public function testSetReference1()
    {
        $value = 'tested';
        $this->object->setReference1($value);
        $this->assertEquals($value, $this->object->reference1);
    }

    /**
     * @covers Multoo\Shipping\Package::setReference2
     */
    public function testSetReference2()
    {
        $value = 'tested';
        $this->object->setReference2($value);
        $this->assertEquals($value, $this->object->reference2);
    }

    /**
     * @covers Multoo\Shipping\Package::setReference3
     */
    public function testSetReference3()
    {
        $value = 'tested';
        $this->object->setReference3($value);
        $this->assertEquals($value, $this->object->reference3);
    }

    /**
     * @covers Multoo\Shipping\Package::setReference4
     */
    public function testSetReference4()
    {
        $value = 'tested';
        $this->object->setReference4($value);
        $this->assertEquals($value, $this->object->reference4);
    }

    /**
     * @covers Multoo\Shipping\Package::setReference5
     */
    public function testSetReference5()
    {
        $value = 'tested';
        $this->object->setReference5($value);
        $this->assertEquals($value, $this->object->reference5);
    }
}
