<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\DemoStore;
use App\Services\DemoService;

class DemoController extends CRUDController
{
    //
    private $createdObjectType;


    public function __construct(DemoService $service)
    {
        parent::__construct($service);
        $this->createdObjectType = 'DemoModel';
    }

    public function store(DemoStore $request)
    {
        return parent::create($request, $this->createdObjectType);
    }
}