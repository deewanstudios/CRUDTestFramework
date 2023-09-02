<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

class CRUDServiceTestcase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $service;
    protected $model;
    protected $factory;

    protected function setUp(): void
    {
        parent::setUp();
    }
}