@extends('layouts.projects')


@section('vite')
    @vite(['resources/scss/create.scss', 'resources/js/app.js'])
@endsection


@section('title')
<div class="container py-4">
<h1 class="mb-4">Aggiungi una nuova Tecnologia</h1>
</div>
@endsection

@section('content')
    <form action="{{route('admin.technologies.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf

        <div class="col-md-6 form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome Progetto" required>
            <label for="name">Nome Tecnologia</label>
            <div class="invalid-feedback">Inserisci il nome della tecnologia</div>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-lg btn-primary">
                <i class="bi bi-save2 me-2"></i> Salva Tecnologia
            </button>
        </div>

    </form>
@endsection