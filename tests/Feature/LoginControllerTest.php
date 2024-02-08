<?php

namespace Tests\Feature;


use App\Models\User;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function test_usuario_registrado_pode_logar()
    {
        // preparar
        $user = User::factory()->create();

        $payload = [
            'email' => $user->email,
            'password' => 'password'
        ];

        // atuar
        $response = $this->post(route('login.auth'), $payload);

        // validar
        $response->assertRedirectToRoute('admin.dashboard');
    }
}
