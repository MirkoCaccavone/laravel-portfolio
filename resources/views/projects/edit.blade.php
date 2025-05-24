@extends('layouts.projects')

@section('title', 'Modifica il progetto')

@section('content')

    <form action="{{route ('projects.update', $project->id)}}" method="POST">
    @csrf
    @method('PUT')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome Progetto</label>
            <input type="text" name="name" id="name" value="{{ $project->name}}">
        </div>
            
        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente</label>
            <input type="text" name="client" id="client" value="{{ $project->client}}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">Periodo</label>
            <input type="date" name="period" id="period" value="{{ $project->period}}">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Riassunto</label>
            <textarea name="summary"  cols="30" rows="5" placeholder="riassunto" id="summary">{{ $project->summary}}</textarea>
        </div>


        <input type="submit" value="Salva">
    </form>
@endsection
