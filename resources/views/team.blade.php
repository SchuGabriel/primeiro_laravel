@extends("layout")
@section("pageTitle", "Novo Time")
@section("content")
    <h1>Novo Time</h1>
    <a href="{{ route('teams.index') }}">Voltar</a>
    <form action="{{ route('teams.store') }}" method="post">
        @csrf

        <label for="name">Nome:</label>
        <br>
        <input type="text" name="name" id="name" value="{{ $team->name }}">
        <br>

        <label for="country">Pais:</label>
        <br>
        <input type="text" name="country" id="country" value="{{ $team->country }}">
        <br>
        
        <button type="submit">Salvar</button>

    </form>
@endsection