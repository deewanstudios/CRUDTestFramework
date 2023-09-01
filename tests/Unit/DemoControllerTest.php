<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\DemoController;
use App\Http\Requests\DemoStore;
use App\Models\DemoModel;
use App\Services\DemoService;
use Database\Factories\DemoModelFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CRUDControllerTestcase;

class DemoControllerTest extends CRUDControllerTestcase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = app(DemoService::class);
        $this->controller = DemoController::class;
        $this->factory = DemoModelFactory::new();
        $this->model = DemoModel::class;
        $this->formRequest = app(DemoStore::class);
        // $this->formRequest = DemoStore::class;
        $this->createdObjectType = 'DemoModel';
    }
}