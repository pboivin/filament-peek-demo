<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            if (!file_exists(database_path('database_test.sqlite'))) {
                touch(database_path('database_test.sqlite'));
            }
        });

        parent::setUp();
    }
}
