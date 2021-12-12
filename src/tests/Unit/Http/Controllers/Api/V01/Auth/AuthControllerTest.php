<?php

namespace Tests\Unit\Http\Controllers\Api\V01\Auth;

use App\Http\Controllers\Api\V01\Auth\AuthController;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  Test Register
     */
    public function test_register_should_be_validate()
    {
        $response = $this->postJson(route('auth.register'));
        $response->assertStatus(422);
    }

    public function test_user_can_register()
    {
        $response = $this->postJson(route('auth.register'), [
            "name" => 'alireza saffar',
            'email' => "test@test.com",
            "password" => "1234567"
        ]);

        $response->assertStatus(201);
    }

    /**
     *  Test Login
     */
    public function test_login_must_be_validate()
    {
        $response = $this->postJson(route("auth.login"));

        $response->assertStatus(422);
    }

    public function test_user_can_login_with_true_credentials()
    {
        $user = User::factory()->createOne();
        $response = $this->postJson(route('auth.login'), [
            "email" => $user->email,
            "password" => "password"
        ]);

        $response->assertStatus(200);
    }

    public function test_show_user_info_if_user_logged_id()
    {
        $user = User::factory()->createOne();
        $response = $this->actingAs($user)->get(route('auth.user'));

        $response->assertStatus(200);
    }

    public function test_logged_in_user_can_logout()
    {
        $user = User::factory()->createOne();
        $response = $this->actingAs($user)->postJson(route('auth.logout'));

        $response->assertStatus(200);
    }
}
