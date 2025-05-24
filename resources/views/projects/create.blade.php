@extends('layouts.projects')

@section('title', 'Aggiungi un progetto')

@section('content')

    <form action="{{route ('projects.store')}}" method="POST">
    @csrf
        <div class="form-control mb-3 d-flex flex-column">
            <label for="name">Nome Progetto</label>
            <input type="text" name="name" id="name">
        </div>
            
        <div class="form-control mb-3 d-flex flex-column">
            <label for="client">Cliente</label>
            <input type="text" name="client" id="client">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="period">Periodo</label>
            <input type="date" name="period" id="period">
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="summary">Riassunto</label>
            <textarea name="summary"  cols="30" rows="5" placeholder="riassunto" id="summary"></textarea>
        </div>


        <input type="submit" value="Salva">
    </form>
@endsection
