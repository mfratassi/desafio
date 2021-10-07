@extends('adminlte::page')
@section("title", "Criar Cidade")
@section("content")
        <form method="post" action="{{route('cidades.store')}}">
            @csrf
            <div class="mb-4">
                <label for="nome" class="form-label">Nome</label>
                <input required type="text" value="" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Nome da cidade</div>
            </div>
            <div class="mb-4">
                <label for="estado" class="form-label">Estado</label>
                <input required maxlength="2" type="text" value="" class="form-control" id="estado" name="estado" aria-describedby="estadoHelp">
                <div id="estadoHelp" class="form-text">SP/RJ/MG...</div>
            </div>
            <select name="grupo_id" id="grupo_id" class="mb-4">
                <option value="{{null}}" selected>Grupo</option>
                @foreach ($gruposcidades as $grupocidade)
                    <option value="{{$grupocidade->id}}">{{$grupocidade->nome}}</option>
                @endforeach
            </select>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-primary" href="{{route('cidades.index')}}">Cidades</a>
                </div>
            </div>
        </form>
@endsection