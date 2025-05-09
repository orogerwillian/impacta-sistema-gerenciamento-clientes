@extends('layouts.master')

@section('title', 'Listagem de clientes')

@section('css')
    <style>
        .card-title {
            padding-top: 10px;
        }

        .card-body:first-child {
            padding-bottom: 0;
        }
    </style>
@stop

@section('content_header')
    <br>
    <x-adminlte-card>
        <form method="get" action="{{ route('clientes.listagem') }}">
            <div class="row">
                <x-adminlte-input name="filtro" label="Filtro" value="{{ request('filtro') ? request('filtro'): null }}"
                                  placeholder="Filtre por código, nome, e-mail, cidade"
                                  fgroup-class="col-md-12" autofocus/>
            </div>

            <x-slot name="footerSlot">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary btn-md" href="{{ route('clientes.listagem') }}">
                        <i class="fa fa-times-circle"></i>
                        <span>Limpar</span>
                    </a>

                    <button id="botao_pesquisar" class="btn btn-primary btn-md ml-2" type="submit">
                        <i class="fa fa-search"></i>
                        <span>Filtrar</span>
                    </button>
                </div>
            </x-slot>
        </form>
    </x-adminlte-card>
@stop

@section('content')

    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <x-adminlte-card title="Clientes cadastrados" theme="info">
        <x-slot name="toolsSlot">
            <a class="btn btn-primary" href="{{ route('clientes.novo') }}">
                <i class="fas fa-plus-circle"></i>
                <span>Adicionar cliente</span>
            </a>
        </x-slot>

        <table class="table table-houver table-bordered">
            <thead>
            <tr>
                <th class="align-middle">Código</th>
                <th class="align-middle">Nome</th>
                <th class="align-middle">E-mail</th>
                <th class="align-middle">Dt Nascimento / Abertura</th>
                <th class="align-middle">Documento</th>
                <th class="align-middle">Cidade</th>
                {{--                <th class="text-center align-middle">Ações</th>--}}
            </tr>
            </thead>

            <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td class="align-middle"><b>{{ $cliente->id }}</b></td>
                    <td class="align-middle">{{ $cliente->nome }}</td>
                    <td class="align-middle">{{ $cliente->email }}</td>
                    <td class="align-middle">{{  date('d/m/Y', strtotime($cliente->data_nascimento)) }}</td>
                    <td class="align-middle">
                        <span>{{ $cliente->cpf_cnpj }}</span><br>
                        <small>{{ $cliente->tipo_pessoa }}</small>
                    </td>
                    <td class="align-middle">{{ $cliente->endereco->cidade->nome }}
                        /{{ $cliente->endereco->cidade->estado->uf }}</td>
                    <td class="align-middle text-center">
                        <a href="{{ route('clientes.visualizar', $cliente->id) }}" class="btn btn-link"
                           style="color: white">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="8">Nenhum cliente encontrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@stop

@section('footer')
    <div class="d-flex justify-content-center">
        <span class="text-light">Sistema de Gerenciamento de Clientes - ADS | Faculdade Impacta</span>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#botao_pesquisar').click(function () {
                $("form").submit();
            });
        });
    </script>
@stop
