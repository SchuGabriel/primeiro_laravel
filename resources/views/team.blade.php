@extends("layout")
@section("pageTitle", "Novo Time")
@section("content")
<div class="container">
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
            <input type="text" name="name" id="name" value="{{ $team->name }}">

            <label for="country">País:</label>
            <input type="text" name="country" id="country" value="{{ $team->country }}">

            <button type="submit">Salvar</button>
        </form>
</div>
@endsection