<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_controller(): void
    {
        $response = $this->getJson("http://localhost:8000/api/transaction");
//        $response->dump();
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'message', 'data'])
        );
    }
}
