<?php

namespace Multoo\Shipping\Provider;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-20 at 11:42:50.
 */
class ProviderFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ProviderFactory
     */
    protected $object;
    protected $injectorMock;

    /**
     * @covers Multoo\Shipping\Provider\ProviderFactory::__construct
     */
    protected function setUp()
    {
        $this->injectorMock = $this->getMockBuilder('Auryn\Provider')
            ->disableOriginalConstructor()
            ->getMock();
        $this->object = new ProviderFactory($this->injectorMock);
    }

    protected function tearDown()
    {
        
    }

    /**
     * @covers Multoo\Shipping\Provider\ProviderFactory::create
     */
    public function testCreate()
    {
        $provider = "Tested";
        $providerObject = new \StdClass();

        $this->injectorMock->expects($this->once())
            ->method('make')
            ->with('\\Multoo\\Shipping\\Provider\\' . $provider)
            ->will($this->returnValue($providerObject));

        $result = $this->object->create($provider);

        $this->assertEquals($providerObject, $result);
    }
}
