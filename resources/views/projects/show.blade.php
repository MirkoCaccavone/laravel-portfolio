@extends('layouts.projects')

@section('title', 'il tuo progetto')
    {{-- @dd($project) --}}


@section('content')

<div class="d-flex py-4 gap-2">
    <a class="btn btn-outline-warning" href="{{route('projects.edit', $project)}}">Modifica</a>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Elimina
  </button>
    
</div>


    <h1>{{$project->name}}</h1>
    <h4>{{$project->client}}</h4>
    <span>{{$project->period}}</span>
    <p>{{$project->summary}}</p> 
    <hr>
    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il Progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare il progetto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form action="{{route('projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            
            <input type="submit" class="btn btn-danger" value="Elimina Definitivamente">
    
        </form>
        </div>
      </div>
    </div>
  </div>
  
  @endsection