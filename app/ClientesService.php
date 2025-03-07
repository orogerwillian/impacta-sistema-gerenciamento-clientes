<?php

namespace App;


use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Enums\StatusClientesEnum;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientesService
{
    public function SalvarCliente(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'estado_civil' => 'required',
            'tipo_pessoa' => 'required',
            'cpf_cnpj' => 'required',
            'email' => 'required|email',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade_id' => 'required'
        ], [
            'nome.required' => 'Campo obrigatório',
            'telefone.required' => 'Campo obrigatório',
            'data_nascimento.required' => 'Campo obrigatório',
            'estado_civil.required' => 'Campo obrigatório',
            'tipo_pessoa.required' => 'Campo obrigatório',
            'cpf_cnpj.required' => 'Campo obrigatório',
            'email.required' => 'Campo obrigatório',
            'email.email' => 'E-mail inválido',
            'cep.required' => 'Campo obrigatório',
            'rua.required' => 'Campo obrigatório',
            'numero.required' => 'Campo obrigatório',
            'bairro.required' => 'Campo obrigatório',
            'cidade_id.required' => 'Campo obrigatório'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $campos = $request->except('_token');

        $cliente = Cliente::create($campos);

        $campos['cliente_id'] = $cliente->id;

        Endereco::create($campos);

        return redirect()
            ->route('clientes.listagem')
            ->with('success', 'Cliente cadastrado com susceso!');
    }

    public function ListarClientes(array $filtros): LengthAwarePaginator
    {
        $filtrosSql = [];

        if (array_key_exists('filtro', $filtros)) {
            $filtrosSql[] = ['nome', 'like', "%{$filtros['filtro']}%"];
            $filtrosSql[] = ['email', 'like', "%{$filtros['filtro']}%"];
            $filtrosSql[] = ['cpf_cnpj', 'like', "%{$filtros['filtro']}%"];
        }

        return Cliente::query()
            ->orWhere($filtrosSql)
            ->orWhereHas('endereco', function ($qEndereco) use ($filtros) {
                $qEndereco->whereHas('cidade', function ($qCidade) use ($filtros) {
                    $qCidade->where('nome', 'like', array_key_exists('filtro', $filtros) ? "%{$filtros['filtro']}%" : "%%");
                });
            })
            ->with('endereco.cidade.estado')
            ->paginate(10);
    }

    public function BuscarClientePorId(int $id)
    {
        return Cliente::query()
            ->where("id", "=", $id)
            ->with('endereco.cidade.estado')
            ->firstOrFail();
    }
}
