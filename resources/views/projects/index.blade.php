@extends('layouts.projects')


@section('content')
<div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="page-title">Progetti</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg shadow-btn">
            <i class="bi bi-plus-circle-fill me-2"></i>Nuovo Progetto
        </a>
    </div>

    @if($projects->isEmpty())
        <div class="alert alert-warning text-center fs-5">
            Nessun progetto trovato.
        </div>
    @else
        <div class="projects-grid">
            @foreach ($projects as $project)
            <article class="project-card shadow-sm rounded">
                <header class="project-header">
                    <h2 class="project-name">{{ $project->name }}</h2>
                    <span class="project-type badge-type">{{ $project->type }}</span>
                </header>

                <div class="project-meta">
                    <p class="client"><i class="bi bi-person-circle"></i> {{ $project->client }}</p>
                    <p class="period"><i class="bi bi-calendar3"></i> {{ $project->period }}</p>
                    <p class="status 
                        @if($project->status === 'completed') status-completed
                        @else status-inprogress @endif">
                        <i class="bi bi-flag-fill"></i> {{ ucfirst($project->status) }}
                    </p>
                </div>

                <p class="summary" title="{{ $project->summary }}">
                    {{ Str::limit($project->summary, 130) }}
                </p>

                <footer class="project-footer">
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="btn btn-link btn-url" title="Vai al progetto">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    @endif
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-details">
                        Dettagli <i class="bi bi-arrow-right-circle ms-1"></i>
                    </a>
                </footer>
            </article>
            @endforeach
        </div>
    @endif
</div>
@endsection
