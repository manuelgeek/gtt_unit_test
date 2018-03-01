<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTegisterAPI()
    {
        //empty request
        $response = $this->json('POST', '/api/register', $payload= []);

        $response
            ->assertStatus(422)
            ->assertJson([
            			"success"=> false,
					    "message"=> [
					        "name"=> [
					            "The name field is required."
					        ],
					        "email"=> [
					            "The email field is required."
					        ],
					        "password"=> [
					            "The password field is required."
					        ]
					    ]
            ]);
        //with payload
        $payload = [
					"name" => "Geek Manu",
					"email" => "mail".rand(100,9999)."@mail.com",//in order to be unique
					"password" => "1234"
				];
        $response = $this->json('POST', '/api/register', $payload);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
				    "success",
				    "data" => [
				        "id",
				        "name",
				        "email",
				        "created_at",
				        "updated_at",
				        "api_token"
				    ]//we use assertJsonStructure cause json itself will be different at every request
            ]);
    }
}
