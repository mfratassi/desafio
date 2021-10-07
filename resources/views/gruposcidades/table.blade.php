    <table class="table table-responsive table-striped table-hover"> 
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cidades</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            
            @forelse ($grupos as $grupo)
            <tr>
                <th scope="row">{{ $grupo->id }}</th>
                <td><a href="{{route('grupos.show', $grupo)}}">{{ $grupo->nome }}</a></td>
                <td>
                    @if ($grupo->cidades !== null)
                        @forelse ($grupo->cidades as $cidade)
                            @php
                                $cidade = App\Models\Cidade::find($cidade);
                            @endphp
                            <a href="{{route('cidades.edit', $cidade->id)}}">{{$cidade->nome}}</a><br/>
                        @empty
                            Sem cidades
                        @endforelse                        
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('grupos.edit',$grupo)}}">Atualizar</a>

                    <form class="d-inline" method="post" action="{{route('grupos.destroy', $grupo)}}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @empty 
            @endforelse
        </tbody>
    </table>