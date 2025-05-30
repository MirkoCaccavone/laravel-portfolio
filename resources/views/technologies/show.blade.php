@extends('layouts.projects')


@section('vite')
    @vite(['resources/scss/show.scss', 'resources/js/app.js'])
@endsection

@section('title', 'Dettaglio Tecnologia')

@section('content')

<div>
    {{$technology->name}}
</div>
@endsection