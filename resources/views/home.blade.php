<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#080b12">
    <meta name="description" content="O Meu Cardápio deixa seu restaurante pronto para receber pedidos online com um cardápio digital simples e bonito.">
    <title>Meu Cardápio — seu restaurante online</title>
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
            <nav class="header-links" aria-label="Navegação principal">
                <a href="#recursos">Recursos</a>
                <a href="#como-funciona">Como funciona</a>
            </nav>
            <a class="header-cta" href="#acesso">Começar agora <span aria-hidden="true">↗</span></a>
        </header>

        <main class="landing-main">
            <section class="hero-copy">
                <div class="hero-badge"><span></span> SEU NEGÓCIO, DO SEU JEITO</div>
                <h1>Seu cardápio merece <span>o próximo nível.</span></h1>
                <p class="hero-description">
                    Crie uma experiência digital que dá água na boca. Reúna seu cardápio em um só lugar e deixe seus clientes descobrirem seus sabores com facilidade.
                </p>

                <div class="hero-actions">
                    <a class="button button--primary" href="#acesso">Quero começar <span class="button__arrow" aria-hidden="true">→</span></a>
                    <a class="text-link" href="#como-funciona"><span class="play-icon" aria-hidden="true">▶</span> Conheça a plataforma</a>
                </div>

                <div class="hero-proof">
                    <div class="proof-avatars" aria-hidden="true">
                        <span>M</span><span>J</span><span>A</span><span>+</span>
                    </div>
                    <div><strong>Feito para quem vive de servir bem.</strong><span>Simples para você. Prático para seus clientes.</span></div>
                </div>
            </section>

            <section class="access-area" id="acesso" aria-label="Acesse ou crie sua conta">
                <div class="access-glow" aria-hidden="true"></div>
                <livewire:auth-panel />
                <p class="access-note"><span aria-hidden="true">✦</span> Seu próximo passo começa aqui.</p>
            </section>
        </main>

        <section class="feature-strip" id="recursos" aria-label="Recursos do Meu Cardápio">
            <article class="feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M4 5.5A1.5 1.5 0 0 1 5.5 4H20v15H5.5A1.5 1.5 0 0 1 4 17.5v-12ZM4 16h16M8 8h8M8 11h5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div><h3>Seu cardápio online</h3><p>Apresente seus produtos de um jeito claro e convidativo.</p></div>
            </article>
            <article class="feature" id="como-funciona">
                <span class="feature__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M12 3 4.5 6v5.3c0 4.6 3.2 8.8 7.5 9.7 4.3-.9 7.5-5.1 7.5-9.7V6L12 3Zm-3 9 2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div><h3>Fácil de administrar</h3><p>Uma área prática para cuidar da presença digital do seu negócio.</p></div>
            </article>
            <article class="feature">
                <span class="feature__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M5 19V9m7 10V5m7 14v-7M3 19h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <div><h3>Mais organização</h3><p>As informações do seu negócio reunidas em um só lugar.</p></div>
            </article>
        </section>

        <footer class="site-footer">
            <a class="brand brand--footer" href="{{ route('home') }}">
                <span class="brand__mark" aria-hidden="true"><svg viewBox="0 0 32 32" fill="none"><path d="M8 5v8M12 5v8M16 5v8M12 13v14M23 5c-3 3-4 7-4 11h4v11" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                <span class="brand__name">meu <strong>cardápio</strong></span>
            </a>
            <span>Feito para deixar seu negócio com mais sabor.</span>
            <span>© {{ date('Y') }} Meu Cardápio</span>
        </footer>
    </div>
    @livewireScripts
</body>
</html>
