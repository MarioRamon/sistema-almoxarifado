
@extends('templates.principal')

@section('title')
    Editar Usuário
@endsection

@section('content')

    <div style="border-bottom: #949494 2px solid; padding: 5px; margin-bottom: 10px">
        <h2>Editar Usuário</h2>
    </div>

    <form action="{{ route('usuario.update', $usuario->id) }}" enctype="multipart/form-data" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">

            <div class="form-group">
                <h2 class="h4"> Dados Institucionais / Pessoais </h2>
            </div>

            <figure caption="{{ $usuario->imagem }}">
            <img src="{{ url('storage/img/usuarios/'.$usuario->imagem) }}" alt="{{ $usuario->imagem }}" width="80" height="80">
            </figure>

            <div class="form-group">
                <label for="imagem"> Selecione uma Imagem </label>
                <input class="form-control-file" type="file" name="imagem" id="imagem" accept=".png, .jpg, .jpeg, .svg, .dib, .bmp">
            </div>
            
            <div class="form-group">
                <label for="nome"> Nome Completo </label>
                <input class="form-control" type="text" name="nome" id="nome" placeHolder="Nome Completo" value="{{ $usuario->nome }}">
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cpf"> CPF </label>
                    <input class="form-control" type="text" name="cpf" id="cpf" placeHolder="000.000.000-00" value="{{ $usuario->cpf }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="rg"> RG </label>
                    <input class="form-control" type="text" name="rg" id="rg" placeHolder="00.000.000" value="{{ $usuario->rg }}">
                </div>

                <div class="form-group">
                    <label for="data_nascimento"> Data de Nascimento </label>
                    <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" min="" max="" value="{{ $usuario->data_nascimento }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="matricula"> Matrícula do Siga </label>
                    <input class="form-control" type="number" name="matricula" id="matricula" placeHolder="000000000" value="{{ $usuario->matricula }}">
                </div>

                <div class="form-group">
                    <label for="cargo"> Cargo </label>
                    <select class="custom-select" name="cargo" id="cargo">
                    <option value="{{ $usuario->cargo_id }}" selected="selected">{{ $usuario->getCargo($usuario->cargo_id)->nome }}</option>
                        @foreach( $cargos as $cargo )
                            @if( $cargo->id != $usuario->cargo_id )
                                <option value="{{ $cargo->id }}"> {{ $cargo->nome }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <h2 class="h4"> Dados de Login </h2>
            </div>

            <div class="form-group">
                <label for="email"> Email </label>
                <input class="form-control" type="email" name="email" id="email" placeHolder="exemplodeemail@upe.br" value="{{ $usuario->email }}">
            </div>

            <div class="form-group">
                <label for="senha"> Senha </label>
                <input class="form-control" type="password" name="senha" id="senha" placeHolder="">
            </div>

            <div class="form-group">
                <label for="confimar_senha"> Confirmar Senha </label>
                <input class="form-control" type="password" name="confirmar_senha" id="confirmar_senha" placeHolder="">
            </div>

            <div class="form-group col-md-12" class="form-row" style="border-bottom: #cfc5c5 1px solid; padding: 0 0 20px 0; margin-bottom: 20px">
            </div>

            @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <Button class="btn btn-secondary" type="button" onclick="location.href = '../' "> Cancelar </Button>
            <Button class="btn btn-success" type="submit"> Cadastrar </Button>

        </div>

    </form>

@endsection