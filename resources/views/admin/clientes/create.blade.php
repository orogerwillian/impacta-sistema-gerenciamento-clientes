@extends('layouts.master')

@section('title', 'Novo cliente')

@section('css')
    <style>
        .select2-container .select2-selection {
            background-color: #d3d3d3;
            border: 1px solid #6c757d;
            border-radius: 0.25rem;
        }

        #s2id_element_id .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: green;
        }

        .card-title {
            padding-top: 10px;
        }

        input[type='number'] {
            -moz-appearance:textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
@stop

@section('content_header')
@stop

@section('content')
    <br/>
    <x-adminlte-card title="Adicionando cliente" theme="info">
        <x-slot name="toolsSlot">
            <a class="btn btn-primary" href="{{ route('clientes.listagem') }}">
                <i class="fa fa-chevron-left"></i>
                <span>Voltar</span>
            </a>
        </x-slot>

        <form action="{{ route('clientes.salvar') }}" method="POST">
            {{ csrf_field() }}
            <fieldset>
                <legend>Dados Pessoais</legend>
                <div class="row">
                    <x-adminlte-input name="nome" label="Nome completo" placeholder="Insira seu nome completo"
                                      fgroup-class="col-md-6" enable-old-support autofocus/>

                    <x-adminlte-input name="email" label="E-mail" type="email" placeholder="Insira seu e-mail"
                                      fgroup-class="col-md-3" enable-old-support/>

                    <x-adminlte-input name="telefone" label="Telefone" type="number" placeholder="14999999999"
                                      fgroup-class="col-md-3" enable-old-support/>

                </div>

                <div class="row">
                    <x-adminlte-input name="data_nascimento" label="Data Nascimento" type="date"
                                      placeholder="dd/mm/aaaa"
                                      fgroup-class="col-md-2" enable-old-support/>

                    <x-adminlte-select2 name="estado_civil" fgroup-class="col-md-2" enable-old-support
                                        label="Estado Civil">
                        <option value="">Selecione...</option>
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                        <option value="Separado(a)">Separado(a)</option>
                        <option value="União estável">União estável</option>
                    </x-adminlte-select2>

                    <x-adminlte-select2 name="tipo_pessoa" fgroup-class="col-md-2" enable-old-support
                                        label="Tipo de pessoa"
                                        style="border-color: #6c757d !important;">
                        <option value="">Selecione...</option>
                        <option value="Física">Física</option>
                        <option value="Jurídica">Jurídica</option>
                    </x-adminlte-select2>

                    <x-adminlte-input name="cpf_cnpj" label="CPF/CNPJ" placeholder="Insira seu documento"
                                      fgroup-class="col-md-2" enable-old-support autofocus/>
                </div>
            </fieldset>

            <fieldset>
                <legend>Endereço</legend>

                <div class="row">
                    <x-adminlte-input id="cep" name="cep" label="Cep" type="number" placeholder="01135000"
                                      fgroup-class="col-md-2" enable-old-support>
                        <x-slot name="appendSlot">
                            <x-adminlte-button id="buscar-cep" theme="info" icon="fa fa-search"/>
                        </x-slot>
                    </x-adminlte-input>

                    @if(old('rua'))
                        <x-adminlte-input id="rua" name="rua" label="Rua" placeholder="Insira sua rua"
                                          fgroup-class="col-md-5" enable-old-support autofocus/>
                    @else
                        <x-adminlte-input id="rua" name="rua" label="Rua" placeholder="Insira seu CEP"
                                          fgroup-class="col-md-5" enable-old-support autofocus disabled/>
                    @endif

                    <x-adminlte-input id="numero" name="numero" label="Número" placeholder="1B"
                                      fgroup-class="col-md-2" enable-old-support autofocus/>

                    @if(old('bairro'))
                        <x-adminlte-input id="bairro" name="bairro" label="Bairro" placeholder="Centro"
                                          fgroup-class="col-md-3" enable-old-support autofocus/>
                    @else
                        <x-adminlte-input id="bairro" name="bairro" label="Bairro" placeholder="Insira seu CEP" disabled
                                          fgroup-class="col-md-3" enable-old-support autofocus/>
                    @endif
                </div>

                <div class="row">
                    @if(old('cidade_id'))
                        <x-adminlte-select2 id="cidade" name="cidade_id" fgroup-class="col-md-4" enable-old-support
                                            label="Cidade" style="background-color: #343a40 !important;">
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}">{{ $cidade->nome }}
                                    /{{ $cidade->estado->uf  }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    @else
                        <x-adminlte-select2 id="cidade" name="cidade_id" fgroup-class="col-md-4" enable-old-support
                                            label="Cidade" style="background-color: #343a40 !important;" disabled>
                            <option value="">Insira seu CEP</option>
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}">{{ $cidade->nome }}/{{ $cidade->estado->uf }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    @endif

                    <x-adminlte-input id="complemento" name="complemento" label="Complemento" placeholder="Apto 125"
                                      fgroup-class="col-md-3" enable-old-support autofocus/>
                </div>
            </fieldset>
        </form>

        <x-slot name="footerSlot">
            <div class="d-flex justify-content-end">
                <x-adminlte-button id="botao-adicionar" theme="success" label="Adicionar" icon="fas fa-check-circle"/>
            </div>
        </x-slot>

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

            const campoCep = $("#cep");
            const campoRua = $("#rua");
            const campoNumero = $("#numero");
            const campoBairro = $("#bairro");
            const campoCidade = $("#cidade");
            const campoComplemento = $("#complemento");

            const buscarCep = function () {
                const cep = campoCep.val();

                if (cep) {
                    $.get(`https://opencep.com/v1/${cep}`)
                        .done(data => {
                            const cidade = data["localidade"] + "/" + data["uf"];
                            let val = campoCidade.find("option:contains('" + cidade + "')").val();

                            campoRua.val(data["logradouro"]).removeAttr('disabled').change();
                            campoBairro.val(data["bairro"]).removeAttr('disabled').change();
                            campoCidade.val(val).trigger('change.select2').change();
                            campoCidade.removeAttr('disabled').change();
                            campoComplemento.removeAttr('disabled').change();

                            campoNumero.focus();
                        })
                        .fail(error => {
                            console.error(error);

                            campoRua.removeAttr('disabled').change();
                            campoBairro.removeAttr('disabled').change();
                            campoCidade.removeAttr('disabled').change();
                            campoComplemento.removeAttr('disabled').change();
                        });
                }
            }

            $("#buscar-cep").click(buscarCep);
            campoCep.change(buscarCep);

            $("#botao-adicionar").click(function () {
                $("form").submit();
            });
        });
    </script>
@stop
