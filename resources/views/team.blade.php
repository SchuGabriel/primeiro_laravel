@extends("layout")
@section("pageTitle", "Novo Time")
@section("content")
    <h1>Novo Time</h1>
    <a href="{{ route('teams.index') }}">Voltar</a>
    @if($team->id)
            <form action="{{ route('teams.update', ['id'=>$team->id]) }}" method="post">
                @method('PUT')
        @else    
            <form action="{{ route('teams.store') }}" method="post">
    @endif
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