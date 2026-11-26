@extends('layouts.dashboard')

@section('title', 'Cardápios')
@section('page-title', 'Cardápios')

@section('content')
    @php
        $availableItems = count(array_filter($items, fn ($item) => $item['available']));
        $categoryCount = count(array_unique(array_column($items, 'category')));
    @endphp

    <section class="page-heading">
        <div>
            <span class="dashboard-eyebrow">SEUS PRODUTOS</span>
            <h1>Cardápios</h1>
            <p>Confira os pratos, bebidas e preços do seu restaurante.</p>
        </div>
    </section>

    <section class="dashboard-stats dashboard-stats--compact" aria-label="Resumo dos cardápios">
        <article class="stat-card">
            <span class="stat-card__icon">▤</span>
            <span class="stat-card__label">Itens cadastrados</span>
            <strong>{{ count($items) }}</strong>
            <span class="stat-card__note">No seu cardápio</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__icon">◉</span>
            <span class="stat-card__label">Disponíveis</span>
            <strong>{{ $availableItems }}</strong>
            <span class="stat-card__note">Itens disponíveis para pedidos</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__icon">▦</span>
            <span class="stat-card__label">Categorias</span>
            <strong>{{ $categoryCount }}</strong>
            <span class="stat-card__note">Categorias no cardápio</span>
        </article>
    </section>

    <section class="content-panel" aria-labelledby="menu-list-title">
        <div class="content-panel__heading">
            <div>
                <h2 id="menu-list-title">Itens do cardápio</h2>
                <p>Veja os itens disponíveis e seus preços.</p>
            </div>
        </div>
        <div class="menu-items">
            @foreach ($items as $item)
                <article class="menu-item">
                    <div class="menu-item__meta">
                        <span class="menu-item__category">{{ $item['category'] }}</span>
                        <span class="menu-item__availability {{ $item['available'] ? 'is-available' : 'is-unavailable' }}">
                            {{ $item['available'] ? 'Disponível' : 'Indisponível' }}
                        </span>
                    </div>
                    <h3>{{ $item['name'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                    <strong class="menu-item__price">R$ {{ number_format($item['price'], 2, ',', '.') }}</strong>
                </article>
            @endforeach
        </div>
    </section>
@endsection
