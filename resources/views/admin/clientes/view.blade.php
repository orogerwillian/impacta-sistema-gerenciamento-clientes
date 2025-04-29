@extends('layouts.master')

@section('title', 'Visualiação de cliente')

@section('css')
    <style>
        input {
            border: none !important;
            padding-left: 0;
            pointer-events: none;
            background-color: #454d55 !important;
            /*color: white;*/
        }

        .card-title {
            padding-top: 10px;
        }
    </style>
@stop

@section('content_header')
@stop

@section('content')
    <br/>
    <br/>
    <x-adminlte-card title="Visualização de cliente" theme="info">
        <x-slot name="toolsSlot">
            <a class="btn btn-primary" href="{{ route('clientes.listagem') }}">
                <i class="fa fa-chevron-left"></i>
                <span>Voltar</span>
            </a>

            <a class="btn btn-secondary" href="#">
                <i class="fa fa-pen"></i>
                <span>Editar</span>
            </a>
        </x-slot>


        <fieldset>
            <legend>Dados Pessoais</legend>
            <div class="row">
                <x-adminlte-input name="nome" label="Nome completo"
                                  fgroup-class="col-md-6" value="{{ $cliente->nome }}"/>

                <x-adminlte-input name="email" label="E-mail" type="text"
                                  fgroup-class="col-md-3" value="{{ $cliente->email }}"/>

                <x-adminlte-input name="telefone" label="Telefone" type="text"
                                  fgroup-class="col-md-3" value="{{ $cliente->telefone }}"/>

            </div>

            <div class="row">
                @if($cliente->tipo_pessoa == 'Física')
                <x-adminlte-input name="data_nascimento" label="Data Nascimento" type="text"
                                  fgroup-class="col-md-3" value="{{ $cliente->data_nascimento }}"/>
                @else
                    <x-adminlte-input name="data_nascimento" label="Data Abertura" type="text"
                                      fgroup-class="col-md-3" value="{{ $cliente->data_nascimento }}"/>
                @endif

                <x-adminlte-input name="estado_civil" label="Estado Civil" type="text"
                                  fgroup-class="col-md-2" value="{{ $cliente->estado_civil }}"/>

                <x-adminlte-input name="tipo_pessoa" label="Tipo pessoa" type="text"
                                  fgroup-class="col-md-2" value="{{ $cliente->tipo_pessoa }}"/>

                <x-adminlte-input name="cpf_cnpj" label="CPF/CNPJ" type="text"
                                  fgroup-class="col-md-2" value="{{ $cliente->cpf_cnpj }}"/>
            </div>
        </fieldset>

        <fieldset>
            <legend>Endereço</legend>

            <div class="row">
                <x-adminlte-input id="cep" name="cep" label="Cep" type="text"
                                  fgroup-class="col-md-2" value="{{ $cliente->endereco->cep }}"/>

                <x-adminlte-input id="rua" name="rua" label="Rua"
                                  fgroup-class="col-md-5" value="{{ $cliente->endereco->rua }}"/>

                <x-adminlte-input id="numero" name="numero" label="Número"
                                  fgroup-class="col-md-2" value="{{ $cliente->endereco->numero }}"/>

                <x-adminlte-input id="bairro" name="bairro" label="Bairro"
                                  fgroup-class="col-md-3" value="{{ $cliente->endereco->bairro }}"/>
            </div>

            <div class="row">
                <x-adminlte-input id="cidade" name="cidade" label="Cidade"
                                  fgroup-class="col-md-4"
                                  value="{{ $cliente->endereco->cidade->nome }}/{{ $cliente->endereco->cidade->estado->uf }}"/>

                @if($cliente->endereco->complemento)
                    <x-adminlte-input id="complemento" name="complemento" label="Complemento"
                                      fgroup-class="col-md-3" value="{{ $cliente->endereco->complemento }}"/>
                @else
                    <x-adminlte-input id="complemento" name="complemento" label="Complemento"
                                      fgroup-class="col-md-3" value="Não informado"/>
                @endif
            </div>
        </fieldset>
    </x-adminlte-card>
@stop

@section('footer')
    <div class="d-flex justify-content-center">
        <span class="text-light">Sistema de Gerenciamento de Clientes - ADS | Faculdade Impacta</span>
    </div>
@stop
