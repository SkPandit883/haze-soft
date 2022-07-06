<?php

namespace Tests\Unit;
use Tests\TestCase;
class DepartmentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_departments_list()
    {
        $response = $this->getJson("/api/departments/1");
        $response->assertSuccessful();
    }
}
