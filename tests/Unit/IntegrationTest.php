<?php

namespace Tests\Unit;

use App\Models\Integration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Laravel\Passport\ClientRepository;
use Tests\MigrateFreshSeedOnce;

class IntegrationTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        dump(env('DB_CONNECTION'));

    }
    public function test_can_create_integration()
    {

        $integrationArr = ['hepsiburada', 'getir', 'trendyol'];
        $index = rand(0 , count($integrationArr) -1);

        $user = User::factory()->create();

        $clientRepository = new ClientRepository();

        // Passport istemcisini oluşturun
        $client = $clientRepository->createPersonalAccessClient(
            $user->id,
            'Test Client', // İstemci adı
            'http://localhost' // İstemci URL'si
        );

        $token = $user->createToken('API TOKEN')->accessToken;

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];

        $data = [
            'integration' => $integrationArr[$index],
            'username' => $this->faker->word,
            'password' => $this->faker->word
        ];

        $this->postJson(route('integration.store'), $data, $headers)
            ->assertStatus(201);
    }

    public function test_can_update_integration()
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

        $response = $this->putJson(route('integration.update')/*'/api/integration/update'*/, array('id' => 1, 'integration' => 'getir'));

        $response->assertStatus(201);
    }

    public function test_can_delete_integration()
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->deleteJson(route('integration.delete')/*'/api/integration/delete'*/, array('id' => 1));

        $response->assertStatus(201);
    }

}
