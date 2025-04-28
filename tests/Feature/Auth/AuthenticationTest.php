<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertOk();  // Changed from assertStatus(200) to assertOk()
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123') // Explicit password
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123', // Match the factory password
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors(); // Verify errors are returned
    }

    public function test_users_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    // Added this new test for better coverage
    public function test_authenticated_users_cannot_access_login_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/login');

        $response->assertRedirect('/dashboard'); // Or wherever authenticated users should be redirected
    }
}