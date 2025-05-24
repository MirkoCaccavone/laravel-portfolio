@extends('layouts.projects')

@section('title', "Tutti i Progetti")

@section('content')

<div class="d-flex py-4 gap-2">
    <a class="btn btn-outline-primary" href="{{route('projects.create')}}">Aggiungi Nuovo Progetto</a>
    
</div>

    {{-- @dd($projects) --}}

    <div class="content">
        @foreach ($projects as $project)
           <h1>{{$project->name}}</h1>
            <h4>{{$project->client}}
            </h4>
            <span>
                {{$project->period}}
            </span>
            <p>
                {{$project->summary}}
            </p> 
            <a href="{{ route("projects.show", $project->id)}}">Visualizza</a>
            <hr>
        @endforeach
        
    </div>
    
@endsection
