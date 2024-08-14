<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    protected $produto;

    public function __construct(Product $produto) {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProdutos = $this->produto->getProdutosPesquisarIndex(search : $pesquisar ?? '');
        return view('produtos.index', compact('findProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormRequestProduto $request)
    {
        if($request->method() == 'POST') {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Product::create($data);

            return redirect()->route('produtos.index');
        }

        return view('produtos.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormRequestProduto $request, int $id)
    {
        if($request->method() == 'PUT') {
            
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscarRegistro = Product::find($id);

            $buscarRegistro->update($data);

            return redirect()->route('produtos.index');

        }

        $produto = Product::where('id', '=', $id)->first();

        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Product::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }
}
