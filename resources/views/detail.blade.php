@extends('layouts.app')

@section('vite')
    @vite(['resources/scss/show.scss', 'resources/js/app.js'])
@endsection

@section('content')
<div class="container my-5">
    <div class="project-actions mb-4">
        <a class="btn btn-outline-primary" href="{{ url('/') }}">
            <i class="bi bi-arrow-left me-2"></i>Torna ai progetti
        </a>
    </div>

    <div class="project-card">
        <h1>{{ $project->name }}</h1>
        <div class="project-meta mb-4">
            <h4 class="mb-3">Cliente: {{ $project->client }}</h4>
            <p class="period"><i class="bi bi-calendar3"></i> {{ $project->period }}</p>
            <p class="type"><i class="bi bi-tag"></i> {{ $project->type->name }}</p>
            <p class="status @if($project->status === 'completed') status-completed @else status-inprogress @endif">
                <i class="bi bi-flag-fill"></i> {{ ucfirst($project->status) }}
            </p>
        </div>

        <div class="project-description">
            <h5 class="mb-3">Descrizione del progetto</h5>
            <p>{{ $project->summary }}</p>
        </div>

        @if($project->project_url)
            <div class="project-url mt-4">
                <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="btn ">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Visita il progetto
                </a>
            </div>
        @endif
    </div>
</div>
@endsection