@extends("layoutplayer")
@section("pageTitle", "Listagem")
@section("content")
<div class="container">
    <h1>Players</h1>
    <a href="{{ route('players.create') }}">Incluir Player</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Name</th>
            <th>Ability</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
        @foreach($players as $player)
        <tr>
            <td>{{ $player->id }}</td>
            <td>
                @if($player->foto)
                <img src="{{ asset('storage/' . $player->foto) }}" alt="{{ $player->name }}" style="max-width:  150px;">
                @endif
            </td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->ability }}</td>
            <td>{{ $player->team->name }}</td>
            <td>
                <a href="{{ route('players.edit', ['id' => $player->id]) }}">Editar</a>
                <br>
                <form action="{{ route('players.destroy', ['id' => $player->id]) }}" method="post">
                    @method("delete")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection