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
        $serviceMock = Mockery::mock($this->service);
        $serviceMock->shouldReceive('store')
            ->once()
            ->with($data)
            ->andReturn($data);

        $modelMock = new $this->model;
        $controller = new $this->controller($this->service);
        // $formRequest = new $this->formRequest;

        dump($data);
        $response = $controller->create($this->formRequest, $data);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertDatabaseHas($modelMock->getTable(), ['id' => $modelMock->id]);

    }


}