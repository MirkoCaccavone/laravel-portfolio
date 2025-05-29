@extends('layouts.projects')


@section('vite')
    @vite(['resources/scss/create.scss', 'resources/js/app.js'])
@endsection


@section('title')
<div class="container py-4">
<h1 class="mb-4">Aggiungi un nuovo progetto</h1>
</div>
@endsection

@section('content')

{{-- @dd($technologies) --}}

<div class="container py-4">

    <form action="{{ route('admin.projects.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf

        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome Progetto" required>
            <label for="name">Nome Progetto</label>
            <div class="invalid-feedback">Inserisci il nome del progetto.</div>
        </div>

        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="client" name="client" placeholder="Cliente" required>
            <label for="client">Cliente</label>
            <div class="invalid-feedback">Inserisci il nome del cliente.</div>
        </div>

        <div class="col-md-6 form-floating">
            <input type="date" class="form-control" id="period" name="period" placeholder="Periodo" required>
            <label for="period">Periodo</label>
            <div class="invalid-feedback">Seleziona una data.</div>
        </div>

        <div class="col-md-6 form-floating">
            <select class="form-select" id="type_id" name="type_id" required>
                <option value="" disabled selected>Seleziona il tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <label for="type_id">Tipo Progetto</label>
            <div class="invalid-feedback">Seleziona un tipo di progetto.</div>
        </div>

        <div class="col-md-6 form-floating">
            <select class="form-select" id="status" name="status" required>
                <option value="" disabled selected>Seleziona lo stato</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <label for="status">Stato</label>
            <div class="invalid-feedback">Seleziona uno stato.</div>
        </div>

        <div class="col-md-6 form-floating">
            <input type="url" class="form-control" id="project_url" name="project_url" placeholder="https://">
            <label for="project_url">URL Progetto (opzionale)</label>
            <div class="invalid-feedback">Inserisci un URL valido.</div>
        </div>

        {{-- checkbox per tecnologie --}}
        <div>
            @foreach ($technologies as $technology)
                <input type="checkbox" name="technologies[]" value="{{$technology->id}}" id="technology-{{$technology->id}}">
                <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                
            @endforeach
        </div>

        <div class="col-12 form-floating">
            <textarea class="form-control" placeholder="Riassunto" id="summary" name="summary" style="height: 120px;" required></textarea>
            <label for="summary">Riassunto</label>
            <div class="invalid-feedback">Scrivi un riassunto del progetto.</div>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-lg btn-primary">
                <i class="bi bi-save2 me-2"></i> Salva Progetto
            </button>
        </div>
    </form>
</div>

@endsection
