<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_form_can_be_rendered(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }
    /** @test */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => Hash::make('Password123!'),
        ]);
    
      
        $response = $this->post(route('authenticate'), [
            'email' => 'testuser@example.com',
            'password' => 'Password123!',
        ]);
    

        $response->assertRedirect('home');
    
        
        $this->assertAuthenticatedAs($user);
    }
    
    public function test_user_cannot_login_with_incorrect_credentials()
    {
     
        $response = $this->post(route('authenticate'), [
            'email' => 'testuser@example.com',
            'password' => 'Incorrect123!',
        ]);

       
        $response->assertRedirect();

    
        $response->assertSessionHas('error', 'Email dan/atau password Anda salah!');

       
        $this->assertGuest();
    }

    public function test_admin_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123!'),
        ]);

        $response = $this->post(route('authenticate') , [
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123!'),
        ]);

        $response->assertRedirect('/');

    }

}
