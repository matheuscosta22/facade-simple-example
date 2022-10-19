<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login(): void
    {
        $user = User::factory()->create(['password' => $password = 'testing']);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $password
        ]);

        $headers['Authorization'] = 'Bearer ' . $response->json();

        $response = $this->withHeaders($headers)->getJson('/api/user');

        $response->assertStatus(Response::HTTP_OK);
    }
}
