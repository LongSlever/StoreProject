<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Product;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    protected $venda;

    public function __construct(Venda $venda) {
        $this->venda = $venda;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search : $pesquisar ?? '');
        return view('vendas.index', compact('findVendas'));
    }

    public function create(Request $request)
    {
        if($request->method() == 'POST') {
            $data = $request->all();
            Venda::create($data);
            Toastr::success('Cadastrado com sucesso');
            return redirect()->route('vendas.index');
        }
        $clientes = Cliente::all();
        $produtos = Product::all();
        $numeracao = Venda::max('numero_da_venda') + 1;
        return view('vendas.new', compact('numeracao', 'produtos', 'clientes'));
    }
}
