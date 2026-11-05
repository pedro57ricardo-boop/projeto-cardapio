<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AuthPanel extends Component
{
    public string $mode = 'login';

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $remember = false;

    public function setMode(string $mode): void
    {
        if (! in_array($mode, ['login', 'register'], true)) {
            throw ValidationException::withMessages([
                'mode' => 'Não foi possível abrir essa opção.',
            ]);
        }

        $this->mode = $mode;
        $this->resetValidation();
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'remember']);
    }

    public function submit()
    {
        if (! in_array($this->mode, ['login', 'register'], true)) {
            throw ValidationException::withMessages([
                'mode' => 'Não foi possível concluir essa ação.',
            ]);
        }

        if ($this->mode === 'register') {
            $data = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create($data);

            Auth::login($user);
            session()->regenerate();

            return $this->redirectRoute('dashboard');
        }

        $credentials = $this->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        $key = Str::lower($this->email).'|'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'email' => 'Muitas tentativas. Tente novamente em '.RateLimiter::availableIn($key).' segundos.',
            ]);
        }

        if (! Auth::attempt($credentials, $this->remember)) {
            RateLimiter::hit($key, 60);

            throw ValidationException::withMessages([
                'email' => 'E-mail ou senha inválidos.',
            ]);
        }

        RateLimiter::clear($key);
        session()->regenerate();

        return $this->redirectRoute('dashboard');
    }

    public function render()
    {
        return view('livewire.auth-panel');
    }
}
