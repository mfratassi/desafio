@extends('adminlte::page')
@section("title", "$grupo->nome")

@section("content")
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Editar Grupo</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  
  <form method="post" action="{{route('grupos.update', $grupo)}}">
      <div class="card-body">
      @csrf
      @method('put')
      {{-- Nome --}}
      <div class="form-group">
        <label for="nome" class="form-label">Nome</label>
        <input required type="text" value="{{$grupo->nome}}" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
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

    <div class="col-xs-6 text-start">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </div>
</form>
<!-- /.card-body -->

<div class="card-footer row">
  <div class="col-xs-6 text-end">
    <a class="btn btn-primary" href="{{route('grupos.create')}}">Criar Novo</a>
    <a class="btn btn-primary" href="{{route('home')}}">Home</a>
    <a class="btn btn-primary" href="{{ url()->previous() }}">Voltar</a>
  </div>
</div>
</div>
<div class="mt-5"></div>
@endsection

@section('js')
    <script type="text/javascript"> 
      let cidades = {!! json_encode($grupo->cidades) !!}
      $('#cidades').val(cidades);
      $('#cidades').trigger('change');
    </script>
@stop