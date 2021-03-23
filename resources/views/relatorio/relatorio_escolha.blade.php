@extends('templates.principal')

@section('title') Relatório Material @endsection

@section('content')
    <div style="border-bottom: #949494 2px solid; padding: 5px; margin-bottom: 10px">
        <h2>RELATÓRIO DE MATERIAIS</h2>
    </div>

    <div>
        <form method="POST" target="_blank" action="{{ route('relatorio.materiais') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="data_inicio" class="col-md-2 col-form-label text-md-right">{{ __('Data de início:') }}</label>

                <div class="col-md-3">
                    <input id="data_inicio" type="date" value="{{ old('data_inicio') }}"
                        class="form-control @error('data_inicio') is-invalid @enderror" name="data_inicio" min="1910-01-01">

                    @error('data_inicio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="tipo_relatorio"
                    class="col-md-2 col-form-label text-md-right">{{ __('Tipo de Relatório:') }}</label>

                <div class="col-md-3">
                    <select id="tipo_relatorio" class="form-control @error('tipo_relatorio') is-invalid @enderror"
                        name="tipo_relatorio">
                        <option value="" selected hidden>Escolher...</option>
                        <option value="0">Entrada de Material</option>
                        <option value="1">Saída de Material</option>
                        <option value="2">Materiais Não Movimentados</option>
                        <option value="3">Saída de Material(Solicitação)</option>
                        <option value="4">Materiais mais movimentados(Solicitação)</option>
                    </select>
                    @error('tipo_relatorio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="data_fim" class="col-md-2 col-form-label text-md-right">{{ __('Data de fim:') }}</label>

                <div class="col-md-3">
                    <input id="data_fim" type="date" value="{{ old('data_fim') }}"
                        class="form-control @error('data_fim') is-invalid @enderror" name="data_fim" min="1910-01-01">

                    @error('data_fim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button id="gera_Relatorio" type="submit" class="btn btn-success">Gerar Relatório</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/relatorio/relatorio_escolha.js')}}"></script>
