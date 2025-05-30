@extends('layouts.projects')

@section('vite')
    @vite(['resources/scss/index.scss', 'resources/js/app.js'])
@endsection

@section('content')
    {{-- @dd($technologies) --}}
    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h3 class="card-title mb-0">Lista Tecnologie</h3>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($technologies as $technology)

                    <li class="list-group-item d-flex justify-content-between align-items-center p-3 hover-bg-light">

                        <a href="{{ route('admin.technologies.show', $technology->id) }}" 
                           class="text-decoration-none link-dark fs-5">
                            <i class="bi bi-code-square me-2"></i>
                            {{$technology->name}}
                        </a>
                        
                        <div class="d-flex gap-2">
                            {{-- <a href="{{ route('admin.technologies.edit', $technology->id) }}" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a> --}}
                            <button type="button" 
                                    class="btn btn-outline-danger btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
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
                Sei sicuro di voler eliminare la tecnologia <strong>{{ $technology->name }}</strong>? Questa azione è irreversibile.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Elimina Definitivamente">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection