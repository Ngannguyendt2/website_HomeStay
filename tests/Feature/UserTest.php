<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanViewLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login')->assertSee('Login');
    }

    public function testUserCanViewRegister()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register')->assertSee('register');
    }
    public function testCanLogin()
    {
        $this->assertGuest();
        $user = factory(User::class)->create([
            'password' => bcrypt('feature'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'feature',
        ])
            ->assertStatus(302)
            ->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }


//    public function testExample()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }
}
