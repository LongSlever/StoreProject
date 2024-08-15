<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestClientes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    
    protected $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findClientes = $this->cliente->getClientesPesquisarIndex(search : $pesquisar ?? '');
        return view('clientes.index', compact('findClientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormRequestClientes $request)
    {
        if($request->method() == 'POST') {
            $data = $request->all();;
            Cliente::create($data);
            Toastr::success('Cadastrado com sucesso');
            return redirect()->route('clientes.index');
        }

        return view('clientes.new');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id)
    {
        if($request->method() == 'PUT') {
            
            $data = $request->all();
            $buscarRegistro = Cliente::find($id);

            $buscarRegistro->update($data);

            return redirect()->route('clientes.index');

        }

        $cliente = Cliente::where('id', '=', $id)->first();

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Cliente::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }
}
