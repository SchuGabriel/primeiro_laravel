@extends("layout")
@section("pageTitle", "Listagem")
@section("content")
    <h1>Times</h1>
    <a href="{{ route('teams.create') }}">Incluir Time</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Pais</th>
            <th>Ações</th>
        </tr>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->country }}</td>
                <td>
                    <a href="{{ route('teams.edit', ['id' => $team->id]) }}">Editar</a>
                    <br>
                    <a href="#">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection