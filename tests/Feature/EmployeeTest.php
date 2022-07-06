<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_employee_details()
    {
        $response = $this->getJson("/api/employee/show/1");
        $response->assertSuccessful();
    }
    public function test_employee_in_a_company(){
        $response = $this->getJson("/api/company/employees/2");
        $response->assertSuccessful();
    }
    public function test_employee_in_a_department(){
        $response = $this->getJson("/api/department/employees/1");
        $response->assertSuccessful();
    }
}
