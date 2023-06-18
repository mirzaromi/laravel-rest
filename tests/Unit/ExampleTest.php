<?php

namespace Tests\Unit;


use App\Models\User;
use App\Service\AuthService;
use App\Service\Implementation\AuthServiceImplementation;
use Illuminate\Http\Request;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    private $authService;


    protected function setUp(): void
    {
        $this->authService = $this->createStub(AuthServiceImplementation::class);

    }

    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {

//        $expectedResult = new User([
//            "name" => "mirza",
//            "email" => "email@email.com",
//            "password" => "password"
//        ]);
//
//
//
//        $this->authService
//            ->method('register')
//            ->willReturn($expectedResult);
//
//        $response = $this->postJson('/api/auth/register/',
//            [
//                "name" => "mirza",
//                "email" => "email3@gmail.com",
//                "password" => "password"
//            ]
//        );
//
//
//        $response->assertStatus(201);
        $this->assertTrue(true);
    }

    public function test_get(): void
    {
        $this->assertTrue(true);
    }
}
