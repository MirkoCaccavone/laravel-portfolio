@extends('layouts.projects')

@section('vite')
    @vite(['resources/scss/edit.scss', 'resources/js/app.js'])
@endsection

@section('title')
<div class="container py-4">
<h1 class="mb-4">Modifica il progetto {{$project->name}}</h1>
</div>
@endsection

@section('content')

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="project-form">
        @csrf
        @method('PUT')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome Progetto</label>
            <input type="text" name="name" id="name" value="{{ $project->name }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente</label>
            <input type="text" name="client" id="client" value="{{ $project->client }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">Periodo</label>
            <input type="date" name="period" id="period" value="{{ $project->period }}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Riassunto</label>
            <textarea name="summary" id="summary" cols="30" rows="5" placeholder="Riassunto">{{ $project->summary }}</textarea>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="type_id">Tipo Progetto</label>
            <select class="form-select" id="type_id" name="type_id" required>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- checkbox per tecnologie --}}
        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach ($technologies as $technology)
            <div class="m-2">
                <input type="checkbox" name="technologies[]" value="{{$technology->id}}" id="technology-{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'checked': ''}}>
                <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
            </div>
                
                
            @endforeach
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="status">Stato</label>
            <select name="status" id="status">
                <option value="inprogress" {{ $project->status === 'inprogress' ? 'selected' : '' }}>In Corso</option>
                <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>Completato</option>
            </select>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="project_url">URL del Progetto</label>
            <input type="url" name="project_url" id="project_url" value="{{ $project->project_url }}">
        </div>

        <input type="submit" value="Salva" class="btn btn-primary mt-3">
    </form>

@endsection
