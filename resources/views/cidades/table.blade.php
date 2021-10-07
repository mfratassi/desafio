    <table class="table table-responsive table-striped table-hover"> 
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Estado</th>
                <th scope="col">Grupo</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cidades as $cidade)
            <tr>
                <th scope="row">{{ $cidade->id }}</th>
                <td><a href="{{route('cidades.show', $cidade)}}">{{ $cidade->nome }}</a></td>
                <td>{{ $cidade->estado->nome }}</td>
                @if ($cidade->grupo_id !== null)
                    <td><a href="{{route('grupos.edit', $cidade->grupocidade)}}">{{ $cidade->grupocidade->nome }}</a></td>
                @else
                    <td></td>
                @endif
                <td>
                    <a class="btn btn-primary" href="{{route('cidades.edit',$cidade)}}">Atualizar</a>

                    <form class="d-inline" method="post" action="{{route('cidades.destroy', $cidade)}}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>