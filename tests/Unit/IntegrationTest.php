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

    use DatabaseTransactions;
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        dump(env('DB_CONNECTION'));


        // Veritabanını sıfırlamak için migrasyonları tekrar çalıştırın

    }
    /*public function test_can_create_integration()
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
    }*/

    public function test_can_update_integration()
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
            'password' => $this->faker->word,
            'id' => 1
        ];

        $this->postJson(route('integration.update'), $data, $headers)
            ->assertStatus(201);
    }

    public function test_can_delete_integration()
    {

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
            'id' => 1
        ];

        $this->postJson(route('integration.delete'), $data, $headers)
            ->assertStatus(201);
    }

}
