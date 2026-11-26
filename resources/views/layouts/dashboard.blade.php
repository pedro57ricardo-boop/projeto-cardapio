<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#080b12">
    <title>@yield('title') — Meu Cardápio</title>
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
                <a class="dashboard-nav__link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" href="{{ route('dashboard') }}">
                    <span aria-hidden="true">▦</span> Visão geral
                </a>
                <a class="dashboard-nav__link {{ request()->routeIs('cardapios') ? 'is-active' : '' }}" href="{{ route('cardapios') }}">
                    <span aria-hidden="true">▤</span> Cardápios
                </a>
                <a class="dashboard-nav__link {{ request()->routeIs('pedidos') ? 'is-active' : '' }}" href="{{ route('pedidos') }}">
                    <span aria-hidden="true">◷</span> Pedidos
                </a>
                <a class="dashboard-nav__link {{ request()->routeIs('equipe') ? 'is-active' : '' }}" href="{{ route('equipe') }}">
                    <span aria-hidden="true">♙</span> Equipe
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="sidebar-help"><span class="sidebar-help__spark">✦</span><strong>Seu espaço</strong><p>Gerencie o cardápio e consulte os pedidos por aqui.</p></div>
            </div>
        </aside>

        <main class="dashboard-content">
            <header class="dashboard-topbar">
                <div class="dashboard-breadcrumb">Painel <span>/</span> @yield('page-title')</div>
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

            @yield('content')

            <footer class="dashboard-footer">© {{ date('Y') }} Meu Cardápio <span>Área de gestão do restaurante.</span></footer>
        </main>
    </div>
</body>
</html>
