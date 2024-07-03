@extends("layoutplayer")
@section("pageTitle", "Novo Player")
@section("content")
<div class="container">
    <h1>Novo Player</h1>
    <a href="{{ route('players.index') }}">Voltar</a>
    @if($player->id)
    <form action="{{ route('players.update', ['id' => $player->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
            @endif
            @csrf

            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $player->name }}">

            <label for="ability">Ability:</label>
            <input type="text" name="ability" id="ability" value="{{ $player->ability }}">

            <label for="team_id">Time:</label>
            <select name="team_id" id="team_id">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">

            <button type="submit">Salvar</button>
        </form>
</div>
@endsection