@extends('adminlte::page')
@section("title", "Criar Cidade")
@section("content")
        <form method="post" action="{{route('grupos.store')}}">
            @csrf

            {{-- Nome --}}
            <div class="mb-4">
                <label for="nome" class="form-label">Nome</label>
                <input required type="text" value="" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
            </div>
            
            {{-- Cidades --}}
            @php
            $config = [
            "placeholder" => "Selecione as Cidades do Grupo"
            ];
            @endphp
            <x-adminlte-select2 id="cidades" name="cidades[]" label="Cidades"
            igroup-size="sm" :config="$config" multiple>
              @foreach ($cidades as $cidade)
                <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
              @endforeach>
            </x-adminlte-select2>
            

            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-primary" href="{{route('grupos.index')}}">Grupos de Cidades</a>
                </div>
            </div>
        </form>
@endsection