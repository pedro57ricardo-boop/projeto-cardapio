<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#080b12">
    <title>Painel administrativo — Meu Cardápio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dashboard-body">
    <div class="dashboard-shell">
        <aside class="dashboard-sidebar">
            <a class="brand" href="{{ route('dashboard') }}">
                <span class="brand__mark" aria-hidden="true">
                    <svg viewBox="0 0 32 32" fill="none"><path d="M8 5v8M12 5v8M16 5v8M12 13v14M23 5c-3 3-4 7-4 11h4v11" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="brand__name">meu <strong>cardápio</strong></span>
            </a>

            <div class="sidebar-label">ESPAÇO DO RESTAURANTE</div>
            <nav class="dashboard-nav" aria-label="Menu administrativo">
                <a class="dashboard-nav__link is-active" href="{{ route('dashboard') }}">
                    <span aria-hidden="true">▦</span> Visão geral
                </a>
                <span class="dashboard-nav__link is-disabled"><span aria-hidden="true">▤</span> Meu cardápio <small>EM BREVE</small></span>
                <span class="dashboard-nav__link is-disabled"><span aria-hidden="true">◷</span> Pedidos <small>EM BREVE</small></span>
                <span class="dashboard-nav__link is-disabled"><span aria-hidden="true">⚙</span> Configurações <small>EM BREVE</small></span>
            </nav>

            <div class="sidebar-bottom">
                <div class="sidebar-help"><span class="sidebar-help__spark">✦</span><strong>Estamos começando</strong><p>Seu espaço está pronto para ganhar vida.</p></div>
            </div>
        </aside>

        <main class="dashboard-content">
            <header class="dashboard-topbar">
                <div class="dashboard-breadcrumb">Painel <span>/</span> Visão geral</div>
                <div class="dashboard-topbar__actions">
                    <div class="account-chip">
                        <span class="account-chip__avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span>
                        <span>{{ auth()->user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="logout-button logout-button--header" type="submit">
                            <span aria-hidden="true">↪</span> Sair da conta
                        </button>
                    </form>
                </div>
            </header>

            <section class="dashboard-welcome">
                <div>
                    <span class="dashboard-eyebrow">SEU ESPAÇO DIGITAL</span>
                    <h1>Olá, {{ auth()->user()->name }} <span aria-hidden="true">✦</span></h1>
                    <p>Bem-vindo ao seu painel. Aqui começa a presença digital do seu negócio.</p>
                </div>
                <span class="welcome-decoration" aria-hidden="true">MC<span>.</span></span>
            </section>

            <section class="dashboard-stats" aria-label="Resumo do painel">
                <article class="stat-card">
                    <span class="stat-card__icon">▤</span>
                    <span class="stat-card__label">Itens no cardápio</span>
                    <strong>0</strong>
                    <span class="stat-card__note">Nenhum item cadastrado</span>
                </article>
                <article class="stat-card">
                    <span class="stat-card__icon">◷</span>
                    <span class="stat-card__label">Pedidos recebidos</span>
                    <strong>0</strong>
                    <span class="stat-card__note">Tudo começa por aqui</span>
                </article>
                <article class="stat-card stat-card--highlight">
                    <span class="stat-card__icon">✦</span>
                    <span class="stat-card__label">Status do espaço</span>
                    <strong class="stat-card__status">Pronto para começar</strong>
                    <span class="stat-card__note">Seu painel está ativo</span>
                </article>
            </section>

            <section class="empty-state">
                <div class="empty-state__art" aria-hidden="true">
                    <span class="empty-state__plate"><span></span></span>
                    <span class="empty-state__spark empty-state__spark--one">✦</span>
                    <span class="empty-state__spark empty-state__spark--two">✧</span>
                </div>
                <span class="dashboard-eyebrow">PRIMEIRO PASSO</span>
                <h2>Seu cardápio começa com uma boa ideia.</h2>
                <p>Esta área está pronta. Em breve, você poderá organizar seus produtos e montar seu cardápio digital por aqui.</p>
                <button class="button button--secondary" type="button" disabled>Cadastro de itens em breve <span aria-hidden="true">→</span></button>
            </section>

            <footer class="dashboard-footer">© {{ date('Y') }} Meu Cardápio <span>Um espaço feito para o seu negócio.</span></footer>
        </main>
    </div>
</body>
</html>
