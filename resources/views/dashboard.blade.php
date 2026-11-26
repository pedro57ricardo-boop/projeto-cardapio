@extends('layouts.dashboard')

@section('title', 'Visão geral')
@section('page-title', 'Visão geral')

@section('content')
    @php($menuItemCount = count(config('cardapio.items', [])))

    <section class="dashboard-welcome">
        <div>
            <span class="dashboard-eyebrow">SEU ESPAÇO DIGITAL</span>
            <h1>Olá, {{ auth()->user()->name }} <span aria-hidden="true">✦</span></h1>
            <p>Acesse seus cardápios e consulte os pedidos do seu negócio.</p>
        </div>
        <span class="welcome-decoration" aria-hidden="true">MC<span>.</span></span>
    </section>

    <section class="dashboard-stats" aria-label="Resumo do painel">
        <article class="stat-card">
            <span class="stat-card__icon">▤</span>
            <span class="stat-card__label">Itens no cardápio</span>
            <strong>{{ $menuItemCount }}</strong>
            <span class="stat-card__note">{{ $menuItemCount === 1 ? 'item cadastrado' : 'itens cadastrados' }}</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__icon">◷</span>
            <span class="stat-card__label">Pedidos recebidos</span>
            <strong>0</strong>
            <span class="stat-card__note">Nenhum pedido recebido</span>
        </article>
        <article class="stat-card stat-card--highlight">
            <span class="stat-card__icon">✦</span>
            <span class="stat-card__label">Acesso</span>
            <strong class="stat-card__status">Ativo</strong>
            <span class="stat-card__note">Sua conta está pronta</span>
        </article>
    </section>

    <section class="dashboard-shortcuts" aria-label="Acessos rápidos">
        <a class="shortcut-card" href="{{ route('cardapios') }}">
            <span class="shortcut-card__icon">▤</span>
            <span><strong>Ver cardápios</strong><small>Consulte os itens cadastrados</small></span>
            <span class="shortcut-card__arrow" aria-hidden="true">→</span>
        </a>
        <a class="shortcut-card" href="{{ route('pedidos') }}">
            <span class="shortcut-card__icon">◷</span>
            <span><strong>Acompanhar pedidos</strong><small>Consulte os pedidos recebidos</small></span>
            <span class="shortcut-card__arrow" aria-hidden="true">→</span>
        </a>
    </section>
@endsection
