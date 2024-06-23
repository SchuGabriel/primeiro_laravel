@extends("layoutplayer")
@section("pageTitle", "Listagem")
@section("content")
<div class="container">
    <h1>Players</h1>
    <a href="{{ route('players.create') }}">Incluir Player</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Ability</th>
            <th>Actions</th>
        </tr>
        @foreach($players as $player)
        <tr>
            <td>{{ $player->id }}</td>
            <td>{{ $player->name }}</td>
            <td>{{ $player->ability }}</td>
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