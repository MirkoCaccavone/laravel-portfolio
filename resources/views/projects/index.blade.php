@extends('layouts.projects')

@section('title', "Tutti i Progetti")

@section('content')
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
            <hr>
        @endforeach
        
    </div>
    
@endsection
