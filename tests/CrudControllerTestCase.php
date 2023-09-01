<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;

class CRUDControllerTestcase extends BaseTestCase
{

    use CreatesApplication, RefreshDatabase;

    protected $service;
    protected $model;
    protected $factory;
    protected $controller;
    protected $formRequest;

    protected $createdObjectType;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function validModelData()
    {
        return $this->factory->make()->toArray();
    }

    public function testCreateMethod()
    {
        $data = $this->validModelData();

        $formRequest = $this->formRequest;

        // dump($formRequest);
        $request = $formRequest->request->replace($data);
        // dd($request);
        // $request->setMethod('POST');
        $request->headers->set('Content-Type', 'application/json');
        // dump($data);
        $serviceMock = Mockery::mock($this->service);
        $serviceMock->shouldReceive('store')
            ->once()
            ->with($data)
            ->andReturn($data);

        $modelMock = new $this->model;
        $controller = new $this->controller($this->service);

        $response = $controller->create($request, $this->createdObjectType);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas($modelMock->getTable(), ['id' => $modelMock->id]);

    }


}