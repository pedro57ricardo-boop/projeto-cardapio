@extends('layouts.dashboard')

@section('title', 'Equipe')
@section('page-title', 'Equipe')

@section('content')
    <section class="page-heading">
        <div>
            <span class="dashboard-eyebrow">QUEM FAZ ACONTECER</span>
            <h1>Equipe</h1>
            <p>Conheça os integrantes da equipe do Meu Cardápio.</p>
        </div>
    </section>

    <section class="content-panel" aria-labelledby="team-list-title">
        <div class="content-panel__heading">
            <div>
                <h2 id="team-list-title">Integrantes</h2>
                <p>{{ count(config('cardapio.team', [])) }} pessoas na equipe</p>
            </div>
        </div>
        <div class="team-grid team-grid--dashboard">
            @foreach (config('cardapio.team', []) as $member)
                <article class="team-card">
                    <span class="team-card__avatar">{{ $member['initials'] }}</span>
                    <h3>{{ $member['name'] }}</h3>
                    <p>Integrante da equipe</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
