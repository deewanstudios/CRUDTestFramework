<?php

namespace App\Services;

use App\Models\DemoModel;
use App\Services\CRUDService;

/**
 * Class DemoService.
 */
class DemoService extends CRUDService
{
    public function __construct()
    {
        parent::__construct(new DemoModel());
    }
}