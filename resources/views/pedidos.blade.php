@extends('layouts.dashboard')

@section('title', 'Pedidos')
@section('page-title', 'Pedidos')

@section('content')
    <section class="page-heading">
        <div>
            <span class="dashboard-eyebrow">ACOMPANHAMENTO</span>
            <h1>Pedidos</h1>
            <p>Acompanhe os pedidos recebidos pelo seu restaurante.</p>
        </div>
    </section>

    <section class="dashboard-stats dashboard-stats--compact" aria-label="Resumo dos pedidos">
        <article class="stat-card">
            <span class="stat-card__icon">◷</span>
            <span class="stat-card__label">Todos os pedidos</span>
            <strong>0</strong>
            <span class="stat-card__note">Nenhum pedido recebido</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__icon">…</span>
            <span class="stat-card__label">Em andamento</span>
            <strong>0</strong>
            <span class="stat-card__note">Aguardando atendimento</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__icon">✓</span>
            <span class="stat-card__label">Concluídos</span>
            <strong>0</strong>
            <span class="stat-card__note">Pedidos finalizados</span>
        </article>
    </section>

    <section class="content-panel" aria-labelledby="orders-list-title">
        <div class="content-panel__heading">
            <div>
                <h2 id="orders-list-title">Pedidos recebidos</h2>
                <p>Os pedidos do seu restaurante serão listados aqui.</p>
            </div>
        </div>
        <div class="empty-state empty-state--panel">
            <div class="empty-state__art" aria-hidden="true">
                <span class="empty-state__plate"><span></span></span>
                <span class="empty-state__spark empty-state__spark--one">✦</span>
                <span class="empty-state__spark empty-state__spark--two">✧</span>
            </div>
            <h2>Nenhum pedido por enquanto</h2>
            <p>Quando você receber pedidos, poderá acompanhá-los nesta página.</p>
        </div>
    </section>
@endsection
