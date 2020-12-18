
@extends('templates.principal')

@section('title')
    Usuario
@endsection

@section('content')

    <div style="border-bottom: #949494 2px solid; padding-bottom: 5px; margin-bottom: 10px">
        <h2>USUÁRIOS CADASTRADOS</h2>
    </div>

    <table id="tableUsuarios" class="table table-hover table-responsove-md">
        <thead style="background-color: #151631; color: white; border-radius: 15px">
            <tr>
                <th scope="col"> Nome </th>
                <th scope="col"> E-mail </th>
                <th scope="col"> Perfil </th>
            </tr>
        </thead>

        <tbody>
        @forelse($usuarios as $usuario)
                <tr onclick="location.href = '{{ route('usuario.edit', ['usuario' => $usuario->id]) }}'" style="cursor: pointer;">
                <td>{{ $usuario->nome }}</th>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->getCargo($usuario->cargo_id)->nome }}</td>
            </tr>
        @empty
            <td colspan="5">Sem usuários cadastrados ainda</td>
        @endempty
        </tbody>
    </table>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/usuario/index.js')}}"></script>