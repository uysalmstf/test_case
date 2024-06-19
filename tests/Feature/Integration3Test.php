<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class Integration3Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->deleteJson(route('integration.del'), array('id' => 1));

        $response->assertStatus(201);
    }
}
