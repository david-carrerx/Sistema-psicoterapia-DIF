@extends('layouts.app')

@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <main>
        <div>
            <img class="main-image" src="{{ asset('assets/home_image.jpeg') }}" alt="DIF Estatal">
        </div>
        <div class="title1">
            <h1>Desarrollo Integral de la Familia</h1>
        </div>
        <div class="title2">
            <h1>Área de psicoterapia</h1>
        </div>
    </main>
@endsection