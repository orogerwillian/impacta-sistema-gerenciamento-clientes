<?php

namespace App\Http\Controllers\Admin;

use App\ClientesService;
use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private ClientesService $service;

    public function __construct()
    {
        $this->service = new ClientesService();
    }

    public function Listagem(Request $request): Factory|View|Application
    {
        $clientes = $this->service->ListarClientes($request->only(['filtro', 'status']));

        return view('admin.clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function Novo(): Factory|View|Application
    {
        $cidades = Cidade::all();

        return view('admin.clientes.create', [
            'cidades' => $cidades
        ]);
    }

    public function Visualizar(int $id): Factory|View|Application
    {
        $cliente = $this->service->BuscarClientePorId($id);

        return view('admin.clientes.view', [
            'cliente' => $cliente
        ]);
    }

    public function SalvarCliente(Request $request): RedirectResponse
    {
        return $this->service->SalvarCliente($request);
    }
}
