@extends('layouts.master')

@section('title', 'Listagem de clientes')

{{--@section('css')--}}
{{--    <style>--}}
{{--        .card-title {--}}
{{--            padding-top: 10px;--}}
{{--        }--}}

{{--        .card-body:first-child {--}}
{{--            padding-bottom: 0;--}}
{{--        }--}}
{{--    </style>--}}
{{--@stop--}}

{{--@section('content_header')--}}
{{--    <br>--}}
{{--    <x-adminlte-card>--}}
{{--        <form>--}}
{{--            <div class="row">--}}
{{--                <x-adminlte-input name="filtro" label="Filtro" value="{{ request('filtro') ? request('filtro'): null }}"--}}
{{--                                  placeholder="Filtre por nome, e-mail, documento ou cidade"--}}
{{--                                  fgroup-class="col-md-12" autofocus/>--}}
{{--            </div>--}}

{{--            <x-slot name="footerSlot">--}}
{{--                <div class="d-flex justify-content-end">--}}
{{--                    <button class="btn btn-secondary btn-md" type="reset">--}}
{{--                        <i class="fa fa-times-circle"></i>--}}
{{--                        <span>Limpar</span>--}}
{{--                    </button>--}}

{{--                    <button class="btn btn-primary btn-md ml-2" type="submit">--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                        <span>Filtrar</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </x-slot>--}}
{{--        </form>--}}
{{--    </x-adminlte-card>--}}
{{--@stop--}}

@section('content')

    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stop

{{--    <x-adminlte-card title="Clientes cadastrados" theme="info">--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12 mb-3">--}}
{{--                <button class="btn btn-success btn-sm btn-action mr-1"--}}
{{--                        data-action="liberar" disabled>--}}
{{--                    <i class="fa fa-unlock"></i>--}}
{{--                    <span>Liberar</span>--}}
{{--                </button>--}}

{{--                <button class="btn btn-danger btn-sm btn-action mr-1"--}}
{{--                        data-action="bloquear" disabled>--}}
{{--                    <i class="fa fa-lock"></i>--}}
{{--                    <span>Bloquear</span>--}}
{{--                </button>--}}

{{--                <button class="btn btn-secondary btn-sm btn-action"--}}
{{--                        data-action="excluir" disabled>--}}
{{--                    <i class="fa fa-times"></i>--}}
{{--                    <span>Excluir</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <x-slot name="toolsSlot">--}}
{{--            <a class="btn btn-primary" href="{{ route('clientes.novo') }}">--}}
{{--                <i class="fas fa-plus-circle"></i>--}}
{{--                <span>Adicionar cliente</span>--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <table class="table table-houver table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th class="text-center">--}}
{{--                    <div class="icheck-info">--}}
{{--                        <input id="selecao-todos" type="checkbox">--}}
{{--                        <label for="selecao-todos"></label>--}}
{{--                    </div>--}}
{{--                </th>--}}
{{--                <th class="align-middle">Nome</th>--}}
{{--                <th class="align-middle">E-mail</th>--}}
{{--                <th class="align-middle">Documento</th>--}}
{{--                <th class="align-middle">Cidade</th>--}}
{{--                <th class="text-right align-middle">Status</th>--}}
{{--                <th class="text-center align-middle">Ações</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}

{{--            <tbody>--}}
{{--            @forelse($clientes as $cliente)--}}
{{--                <tr>--}}
{{--                    <td class="align-middle text-center">--}}
{{--                        <div class="icheck-info">--}}
{{--                            <input id="selecao-{{$cliente->id}}" type="checkbox" value="{{ $cliente->id }}">--}}
{{--                            <label for="selecao-{{$cliente->id}}"></label>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                    <td class="align-middle">{{ $cliente->nome }}</td>--}}
{{--                    <td class="align-middle">{{ $cliente->email }}</td>--}}
{{--                    <td class="align-middle">--}}
{{--                        <span>{{ $cliente->cpf_cnpj }}</span><br>--}}
{{--                        <small>{{ $cliente->tipo_pessoa }}</small>--}}
{{--                    </td>--}}
{{--                    <td class="align-middle">{{ $cliente->endereco->cidade->nome }}--}}
{{--                        /{{ $cliente->endereco->cidade->estado->uf }}</td>--}}
{{--                    <td class="text-right align-middle">--}}
{{--                        @switch($cliente->status)--}}
{{--                            @case("Liberado")--}}
{{--                                <span class="badge badge-success text-light"--}}
{{--                                      style="font-size: 11pt">{{ $cliente->status }}</span>--}}
{{--                                @break--}}
{{--                            @case("Bloqueado")--}}
{{--                                <span class="badge badge-danger text-light"--}}
{{--                                      style="font-size: 11pt">{{ $cliente->status }}</span>--}}
{{--                                @break--}}
{{--                        @endswitch--}}
{{--                    </td>--}}
{{--                    <td class="align-middle text-center">--}}
{{--                        <a href="#" class="btn btn-link" style="color: white">--}}
{{--                            <i class="fa fa-pen"></i>--}}
{{--                        </a>--}}
{{--                        <a href="{{ route('clientes.visualizar', $cliente->id) }}" class="btn btn-link"--}}
{{--                           style="color: white">--}}
{{--                            <i class="fa fa-eye"></i>--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @empty--}}
{{--                <tr class="text-center">--}}
{{--                    <td colspan="8">Nenhum cliente encontrado!</td>--}}
{{--                </tr>--}}
{{--            @endforelse--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </x-adminlte-card>--}}
{{--@stop--}}

{{--@section('footer')--}}
{{--    <div class="d-flex justify-content-center">--}}
{{--        <span class="text-light">Sistema de Gerenciamento de Clientes - ADS | Faculdade Impacta</span>--}}
{{--    </div>--}}
{{--@stop--}}
