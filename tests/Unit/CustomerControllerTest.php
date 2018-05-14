<?php

namespace Tests;

use DateTime;
use PhpunitBundle\Controller\CustomerController;
use PhpunitBundle\Entity\Customer;
use PhpunitBundle\Service\CustomerService;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerControllerTest extends TestCase 
{
    /** @var CustomerService|PHPUnit_Framework_MockObject_MockObject */
    private $customerServiceMock;
    /** @var CustomerController|PHPUnit_Framework_MockObject_MockObject */
    private $customerControllerMock;

    protected function setUp()
    {
        $this->customerServiceMock = $this->getMockBuilder(CustomerService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerControllerMock = new CustomerController(
            $this->customerServiceMock
        );
    }

    protected function tearDown()
    {
        $this->customerServiceMock = null;
        $this->customerControllerMock = null;
    }

    /**
     * @dataProvider getAllActionDataProvider
     */
    public function testGetAllAction($customers)
    {
        $this->customerServiceMock
            ->expects($this->once())
            ->method('getAll')
            ->willReturn($customers);

        $result = $this->customerControllerMock->getAllAction();

        $response = new Response(json_encode($customers));

        $this->assertEquals($response, $result);
    }

    public function testGetOneAction()
    {
        $id = 1;

        $customer = new Customer();
        $customer->setId($id);
        $customer->setName('Name 1');
        $customer->setDob(new DateTime());

        $this->customerServiceMock
            ->expects($this->once())
            ->method('getOne')
            ->with($id)
            ->willReturn($customer);

        $result = $this->customerControllerMock->getOneAction($id);

        $response = new Response(json_encode($customer));

        $this->assertEquals($response, $result);
    }

    public function testCreateOneAction()
    {
        $id = 1;
        $payload = '{"name":"Name 1", "dob":"2017-01-01"}';

        $requestMock = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $requestMock
            ->expects($this->once())
            ->method('getContent')
            ->willReturn($payload);

        $this->customerServiceMock
            ->expects($this->once())
            ->method('createOne')
            ->with(json_decode($payload, true))
            ->willReturn($id);

        $result = $this->customerControllerMock->createOneAction($requestMock);

        $response = new Response($id, Response::HTTP_CREATED);

        $this->assertEquals($response, $result);
    }

    public function testUpdateOneAction()
    {
        $id = 1;
        $payload = '{"name":"Name 1", "dob":"2017-01-01"}';

        $requestMock = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $requestMock
            ->expects($this->once())
            ->method('getContent')
            ->willReturn($payload);

        $this->customerServiceMock
            ->expects($this->once())
            ->method('updateOne')
            ->with(json_decode($payload, true), $id);

        $result = $this->customerControllerMock->updateOneAction($requestMock, $id);

        $response = new Response();

        $this->assertEquals($response, $result);
    }

    public function testDeleteOneAction()
    {
        $id = 1;

        $this->customerServiceMock
            ->expects($this->once())
            ->method('deleteOne')
            ->with($id);

        $result = $this->customerControllerMock->deleteOneAction($id);

        $response = new Response();

        $this->assertEquals($response, $result);
    }

    public function getAllActionDataProvider()
    {
        $c0 = [];
        $customers0 = [$c0];

        $c1 = new Customer();
        $c1->setId(1);
        $c1->setName('Name 1');
        $c1->setDob(new DateTime());
        $customers1 = [$c1];

        $c2 = new Customer();
        $c2->setId(2);
        $c2->setName('Name 2');
        $c2->setDob(new DateTime());
        $customers2 = [$c1, $c2];

        return [
            [$customers0],
            [$customers1],
            [$customers2]
        ];
    }
}
