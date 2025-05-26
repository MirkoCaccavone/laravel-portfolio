@extends('layouts.projects')


@section('vite')
    @vite(['resources/scss/show.scss', 'resources/js/app.js'])
@endsection

@section('title', 'Dettaglio Progetto')


@section('content')
<div class="project-actions d-flex justify-content-between align-items-center mb-4 mt-4">
    <a class="btn btn-outline-primary" href="{{ route('admin.projects.index') }}">
        ← Torna alla lista
    </a>

    <div class="d-flex gap-2">
        <a class="btn btn-outline-warning" href="{{ route('admin.projects.edit', $project) }}">
            ✏️ Modifica
        </a>

        <!-- Pulsante per aprire il modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            🗑️ Elimina
        </button>
    </div>
</div>

<div class="project-card">
    <h1>{{ $project->name }}</h1>
    <h4 class="mb-1">Cliente: {{ $project->client }}</h4>
    
    <span class="text-muted d-block mb-3">
        Periodo: {{ \Carbon\Carbon::parse($project->period)->format('d/m/Y') }}
    </span>

    <p><strong>Riassunto:</strong><br>{{ $project->summary }}</p>

    @if ($project->type)
        <span class="badge bg-info text-dark me-2">Tipo: {{ $project->type }}</span>
    @endif

    @if ($project->status)
        <span class="badge {{ $project->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
            Stato: {{ ucfirst($project->status) }}
        </span>
    @endif

    @if($project->project_url)
            <div class="project-url mt-4">
                <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="btn ">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Visita il progetto
                </a>
            </div>
        @endif
</div>

<!-- Modal per la conferma eliminazione -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Conferma Eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare il progetto <strong>{{ $project->name }}</strong>? Questa azione è irreversibile.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Elimina Definitivamente">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
