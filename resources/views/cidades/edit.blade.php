@extends('adminlte::page')
@section("title", "$cidade->nome")

@section("content")
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editar Cidade</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('cidades.update', $cidade)}}">
        @csrf
        @method('put')
      <div class="card-body">
            {{-- Nome --}}
            <div class="form-group">
                <label for="nome" class="form-label">Nome</label>
                <input required type="text" value="{{$cidade->nome}}" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Nome da cidade</div>
            </div>

            {{-- Estado --}}
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <input required maxlength="2" type="text" value="{{$cidade->estado}}" class="form-control" id="estado" name="estado" aria-describedby="estadoHelp">
                <div id="estadoHelp" class="form-text">SP/RJ/MG...</div>
            </div>

            {{-- Grupo --}}

            <label for="grupo_id">Grupo</label>
            <x-adminlte-select2 name="grupo_id" id="grupo_id" class="mb-4"
                data-placeholder="Selecione o grupo">
                <option value="{{null}}">Nenhum Grupo</option>
                @foreach ($gruposcidades as $grupocidade)
                    @if ($grupocidade->id == $cidade->grupo_id)
                        <option value="{{$grupocidade->id}}" selected>{{$grupocidade->nome}}</option>
                    @else
                        <option value="{{$grupocidade->id}}">{{$grupocidade->nome}}</option>
                    @endif
                @endforeach
            </x-adminlte-select2>
      </div>
      <!-- /.card-body -->

      <div class="card-footer row">
        <div class="col-xs-6 text-start">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <div class="col-xs-6 text-right">
            <a class="btn btn-primary" href="{{route('cidades.create')}}">Criar Novo</a>
            <a class="btn btn-primary" href="{{url()->previous()}}">Voltar</a>
            <a class="btn btn-primary" href="{{route('home')}}">Home</a>
            <a class="btn btn-primary" href="{{route('cidades.index')}}">Cidades</a>
        </div>
      </div>
    </form>
    <div class="mt-5"></div>
@endsection