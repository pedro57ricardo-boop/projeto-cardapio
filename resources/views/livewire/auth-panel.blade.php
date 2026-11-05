<section class="auth-card" aria-labelledby="auth-title">
    <div class="auth-card__topline">
        <span class="auth-card__eyebrow">{{ $mode === 'login' ? 'BEM-VINDO DE VOLTA' : 'COMECE AGORA' }}</span>
        <span class="auth-card__secure"><span aria-hidden="true">●</span> Acesso seguro</span>
    </div>

    <h2 id="auth-title" class="auth-card__title">
        {{ $mode === 'login' ? 'Acesse sua conta' : 'Crie sua conta' }}
    </h2>
    <p class="auth-card__description">
        {{ $mode === 'login' ? 'Entre para gerenciar seu negócio.' : 'Leva menos de um minuto para começar.' }}
    </p>

    <div class="auth-tabs" role="tablist" aria-label="Acesso à conta">
        <button
            type="button"
            class="auth-tabs__tab {{ $mode === 'login' ? 'is-active' : '' }}"
            role="tab"
            aria-selected="{{ $mode === 'login' ? 'true' : 'false' }}"
            wire:click="setMode('login')"
        >Entrar</button>
        <button
            type="button"
            class="auth-tabs__tab {{ $mode === 'register' ? 'is-active' : '' }}"
            role="tab"
            aria-selected="{{ $mode === 'register' ? 'true' : 'false' }}"
            wire:click="setMode('register')"
        >Criar conta</button>
    </div>

    <form class="auth-form" wire:submit="submit">
        @if ($mode === 'register')
            <div class="form-field">
                <label for="name">Nome completo</label>
                <input id="name" type="text" wire:model="name" autocomplete="name" placeholder="Como podemos te chamar?">
                @error('name') <span class="field-error">{{ $message }}</span> @enderror
            </div>
        @endif

        <div class="form-field">
            <label for="email">E-mail</label>
            <input id="email" type="email" wire:model="email" autocomplete="email" placeholder="voce@seunegocio.com.br">
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-field">
            <div class="form-field__label-row">
                <label for="password">Senha</label>
                @if ($mode === 'login')
                    <span class="form-field__hint">Mínimo de 8 caracteres</span>
                @endif
            </div>
            <input
                id="password"
                type="password"
                wire:model="password"
                autocomplete="{{ $mode === 'login' ? 'current-password' : 'new-password' }}"
                placeholder="••••••••"
            >
            @error('password') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        @if ($mode === 'register')
            <div class="form-field">
                <label for="password_confirmation">Confirme sua senha</label>
                <input id="password_confirmation" type="password" wire:model="password_confirmation" autocomplete="new-password" placeholder="Digite a senha novamente">
            </div>
        @else
            <label class="remember-option">
                <input type="checkbox" wire:model="remember">
                <span>Manter conectado</span>
            </label>
        @endif

        @error('mode') <span class="field-error">{{ $message }}</span> @enderror

        <button class="button button--primary auth-form__submit" type="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>{{ $mode === 'login' ? 'Entrar na minha conta' : 'Criar minha conta' }}</span>
            <span wire:loading>Um momento...</span>
            <span class="button__arrow" aria-hidden="true">→</span>
        </button>
    </form>

    <p class="auth-card__terms">
        Ao continuar, você concorda com nossos <a href="#termos">termos de uso</a> e <a href="#privacidade">política de privacidade</a>.
    </p>
</section>
