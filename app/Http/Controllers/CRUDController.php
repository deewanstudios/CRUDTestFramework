<?php

namespace App\Http\Controllers;

use App\Services\CRUDService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    protected $service;

    public function __construct(CRUDService $service)
    {
        $this->service = $service;
    }

    public function create(FormRequest $request, $objectType)
    {
        $data = $this->service->store($request->validated());
    }
}