@extends("app")
@section("titulo-pagina", "Edit Cidade $cidade->nome")
@section("conteudo-principal")
        <h2>Editar Cidade: {{$cidade->nome}}</h2>
        <form method="post" action="{{route('clients.update', $cidade)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input required type="text" value="{{$cidade->nome}}" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp">
                <div id="nomeHelp" class="form-text">Nome da Cidade</div>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input required type="text" value="{{$cidade->estado}}" class="form-control" id="estado" name="estado"  maxlength="2" aria-describedby="estadoHelp">
                <div id="estadoHelp" class="form-text">SP/RJ/MG...</div>
            </div>
            
            <select name="grupo" id="grupo">
                <option value="Grupo" disabled>Grupo</option>
                @forelse ($gruposCidades as $grupoCidades)
                    <option value="{{$grupoCidades->id}}">{{$grupoCidades->nome}}</option>
                @empty
                @endforelse
            </select>

            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-primary" href="{{route('clients.create')}}">Criar Novo</a>
                    <a class="btn btn-primary" href="{{route('index')}}">Home</a>
                    <a class="btn btn-primary" href="{{route('clients.index')}}">Cidades</a>
                </div>
        </form>
        <div class="mt-5"></div>
        @include('clients.table')
@endsection