<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class Integration2Test extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $integrationArr = ['hepsiburada', 'getir', 'trendyol'];
        $index = rand(0 , count($integrationArr) -1);

        $data = [
            'integration' => $integrationArr[$index],
            'username' => $this->faker->word,
            'password' => $this->faker->word,
            'id' => 1
        ];

        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
