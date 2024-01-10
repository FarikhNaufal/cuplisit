<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, InteractsWithSession;
    public function test_login_view(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    

    public function test_login_valid_credentials(): void{
        $user = User::factory()->create([
            'dob' => '2001-01-01',
            'password' => 'password'
        ]);
        
        $response = $this->post('/login', [
            'EmailOrUsername' => $user->username,
            'password' => 'password'
        ]);
 
        $this->assertTrue(Auth::check());
    }

    public function test_login_null_credentials_throw_error():void {
        $response = $this->post('/login', [
            'EmailOrUsername' => null,
            'password' => null
        ]);

        $response->assertSessionHasErrors([
            'EmailOrUsername' => 'The email or username field is required.',
            'password' => 'The password field is required.'
        ]);
    }

    public function test_login_less_character_username_throw_error(): void {
        $response = $this->post('/login', [
            'EmailOrUsername' => '123',
            'password' => 'password'
        ]);

        $response->assertSessionHasErrors([
            'EmailOrUsername' => 'The email or username field must be at least 4 characters.',
        ]);
    }

    public function test_login_less_character_password_throw_error(): void {
        $response = $this->post('/login', [
            'EmailOrUsername' => 'username',
            'password' => '123456'
        ]);

        $response->assertSessionHasErrors([
            'password' => 'The password field must be at least 8 characters.',
        ]);
    }

    public function test_login_wrong_credentials_throw_error():void {
        $response = $this->post('/login', [
            'EmailOrUsername' => 'wrongusername',
            'password' => 'password'
        ]);

        $this->assertFalse(Auth::check());
        $response->assertSessionHas('loginerror', 'Wrong credentials.');
    }
    
}
