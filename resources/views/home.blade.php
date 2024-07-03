@extends("layout")
@section("pageTitle", "Home")
@section("style")
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}" type="text/css" />
@endsection
@section("content")
<div class="container">
    <h1>Bem vindo</h1>
    <ul class="link-list">
        <li><a href="{{ route('teams.index') }}">Listar Times</a></li>
        <li><a href="{{ route('players.index') }}">Listar Player</a></li>
    </ul>
</div>
@endsection