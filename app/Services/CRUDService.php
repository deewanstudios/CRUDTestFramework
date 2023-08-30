<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CRUDService.
 */
class CRUDService
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model::create($data);
    }

}