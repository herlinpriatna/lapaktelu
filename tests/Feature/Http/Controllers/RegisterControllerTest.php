<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    public function test_register_form_can_be_rendered(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_register()
    {
        $userData = [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'SecurePass123!',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertRedirect(route('login'))
            ->assertSessionHas('success', 'Registrasi berhasil! Silahkan login');

        // Assert that the user is stored in the database with the correct attributes
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'username' => $userData['username'],
        ]);

        // Retrieve the user from the database
        $user = User::where('email', $userData['email'])->first();

        // Assert that the user's password is correctly hashed
        $this->assertTrue(Hash::check($userData['password'], $user->password));
    }

    
    
    public function test_user_cannot_register_with_invalid_data()
    {
            
            $response = $this->post(route('register'), [
                'username' => 'short123', 
                'email' => 'invalid_email', 
                'password' => 'Weakpassword123!',
            ]);
    
           
            $response->assertRedirect();
            
            $this->assertDatabaseMissing('users', ['email' => 'invalid_email']);
    
            $this->assertGuest();
    }
}

