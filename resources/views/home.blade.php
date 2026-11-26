<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#080b12">
    <meta name="description" content="Acesse seu espaço Meu Cardápio para organizar o cardápio e acompanhar pedidos.">
    <title>Meu Cardápio — gestão do restaurante</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="site-body">
    <div class="landing-shell">
        <header class="site-header">
            <a class="brand" href="{{ route('home') }}" aria-label="Meu Cardápio - início">
                <span class="brand__mark" aria-hidden="true">
                    <svg viewBox="0 0 32 32" fill="none">
                        <path d="M8 5v8M12 5v8M16 5v8M12 13v14M23 5c-3 3-4 7-4 11h4v11" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="brand__name">meu <strong>cardápio</strong></span>
            </a>
        </header>

        <main class="landing-main">
            <section class="hero-copy">
                <div class="hero-badge"><span></span> GESTÃO DO SEU RESTAURANTE</div>
                <h1>Cardápio e pedidos <span>em um só lugar.</span></h1>
                <p class="hero-description">
                    Entre no seu espaço para organizar os itens do cardápio e acompanhar os pedidos do seu negócio.
                </p>
            </section>

            <section class="access-area" id="acesso" aria-label="Acesse ou crie sua conta">
                <div class="access-glow" aria-hidden="true"></div>
                <livewire:auth-panel />
            </section>
        </main>

        <section class="team-section" aria-labelledby="team-title">
            <div class="team-section__heading">
                <span class="dashboard-eyebrow">QUEM FAZ ACONTECER</span>
                <h2 id="team-title">Nossa equipe</h2>
                <p>As pessoas por trás do Meu Cardápio.</p>
            </div>
            <div class="team-grid">
                @foreach (config('cardapio.team') as $member)
                    <article class="team-card">
                        <span class="team-card__avatar">{{ $member['initials'] }}</span>
                        <h3>{{ $member['name'] }}</h3>
                        <p>Integrante da equipe</p>
                    </article>
                @endforeach
            </div>
        </section>

        <footer class="site-footer">
            <a class="brand brand--footer" href="{{ route('home') }}">
                <span class="brand__mark" aria-hidden="true"><svg viewBox="0 0 32 32" fill="none"><path d="M8 5v8M12 5v8M16 5v8M12 13v14M23 5c-3 3-4 7-4 11h4v11" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <span class="brand__name">meu <strong>cardápio</strong></span>
            </a>
            <span>© {{ date('Y') }} Meu Cardápio</span>
        </footer>
    </div>
    @livewireScripts
</body>
</html>
