<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteVenda;
use App\Models\Cliente;
use App\Models\Product;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function enviaComprovante($id) {
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->product->nome;
        $clienteNome =  $buscaVenda->cliente->nome;
        $clienteEmail =  $buscaVenda->cliente->email;
        $sendMailData = [
            'produtoNome' => $produtoNome,
            'body' => $clienteNome,
        ];
        Mail::to($clienteEmail)->send(new ComprovanteVenda($sendMailData));
        Toastr::success('Enviado com sucesso');
        return redirect()->route('vendas.index');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Venda::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }
}
