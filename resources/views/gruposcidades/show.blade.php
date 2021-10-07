@extends("adminlte::page")
@section("title", "Grupo $grupo->nome")
@section("content")
        @if(isset($grupo->id))
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detalhes do Grupo {{$grupo->nome}} </h5>
            </div>
            <div class="card-body">
                <p><strong>ID: </strong>{{ $grupo->id }}</p>
                <p><strong>Nome: </strong>{{ $grupo->nome }}</p>
                <p><strong>Cidades: </strong>
                    @forelse ($grupo->cidades as $cidade)
                        <a href="{{route('cidades.edit', $cidade)}}">{{$cidade->nome}}</a>
                    @empty
                        Sem cidades
                    @endforelse
                </p>
            </div>
        </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Não há Grupos para mostrar</h5>
                </div>
                <div class="card-body">
                    <a href="#">Criar Grupo</a>
                </div>
            </div>
        @endif
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-success">Voltar</a>
        </div>
@endsection