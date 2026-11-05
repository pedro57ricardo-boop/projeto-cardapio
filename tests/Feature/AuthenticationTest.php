<?php

namespace Tests\Feature;

use App\Livewire\AuthPanel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_the_landing_page_and_authentication_options(): void
    {
        $this->withoutVite()
            ->get('/')
            ->assertOk()
            ->assertSee('Meu Cardápio')
            ->assertSee('Acesse sua conta')
            ->assertSee('Criar conta');
    }

    public function test_user_can_create_an_account_and_is_redirected_to_admin(): void
    {
        $this->withSession([]);

        Livewire::test(AuthPanel::class)
            ->set('mode', 'register')
            ->set('name', 'Maria Silva')
            ->set('email', 'maria@example.com')
            ->set('password', 'senha-segura-123')
            ->set('password_confirmation', 'senha-segura-123')
            ->call('submit')
            ->assertRedirect(route('dashboard'));

        $user = User::where('email', 'maria@example.com')->firstOrFail();

        $this->assertAuthenticatedAs($user);
        $this->assertTrue(Hash::check('senha-segura-123', $user->password));
    }

    public function test_existing_user_can_log_in_and_reach_admin(): void
    {
        $this->withSession([]);

        $user = User::factory()->create([
            'name' => 'João',
            'email' => 'joao@example.com',
            'password' => Hash::make('senha-segura-123'),
        ]);

        Livewire::test(AuthPanel::class)
            ->set('email', 'joao@example.com')
            ->set('password', 'senha-segura-123')
            ->call('submit')
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
        $this->get(route('dashboard'))->assertOk()->assertSee('João')->assertSee('0');
    }

    public function test_admin_is_protected_and_logout_ends_the_session(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));

        $user = User::factory()->create();
        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest();
    }
}
