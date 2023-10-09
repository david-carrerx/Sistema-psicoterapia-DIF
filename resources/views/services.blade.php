@extends('layouts.app')

@section('title', 'Servicios')
@section('content')
    <!--Retorno de información de servicios-->
    <h1>Servicios</h1>
    @foreach ($services as $service)
        <span>{{ $service->id}}</span>
        <span>{{ $service->name}}</span>
        <span>{{ $service->price}}</span><br>
    @endforeach
@endsection