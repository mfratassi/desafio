@extends("adminlte::page")
@section("title", $titulo)
@section("content")
        @if(isset($cidade->id))
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detalhes da Cidade {{$cidade->nome}} </h5>
            </div>
            <div class="card-body">
                <p><strong>ID: </strong>{{ $cidade->id }}</p>
                <p><strong>Nome: </strong>{{ $cidade->nome }}</p>
                <p><strong>Estado: </strong>{{ $cidade->estado }}</p>
                <p><strong>Grupo: </strong>{{ $cidade->grupocidade? $cidade->grupocidade->nome : "Sem grupo" }}</p>
            </div>
        </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Não há cidades para mostrar</h5>
                </div>
                <div class="card-body">
                    <a href="#">Criar Cidade</a>
                </div>
            </div>
        @endif
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-success">Voltar</a>
        </div>
@endsection