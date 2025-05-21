@extends('layouts.projects')

@section('title', $project->name)
    {{-- @dd($project) --}}
@section('content')
    <h1>{{$project->name}}</h1>
    <h4>{{$project->client}}</h4>
    <span>{{$project->period}}</span>
    <p>{{$project->summary}}</p> 
    <hr>
    
@endsection