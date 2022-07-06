<?php

namespace Tests\Unit;

use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_companies_list()
    {
        $response = $this->getJson("/api/companies");
        $response->assertSuccessful();
    }
}
