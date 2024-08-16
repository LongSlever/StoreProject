<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Product;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totaldeProduto = $this->buscaTotalProduto();
        $totaldeCliente = $this->buscaTotalCliente();
        $totaldeVenda = $this->buscaTotalVenda();
        $totaldeUsuario = $this->buscaTotalUsuario();
        return view('dashboard.index', compact('totaldeProduto', 'totaldeCliente', 'totaldeVenda', 'totaldeUsuario'));
    }


    public function buscaTotalProduto() {
        $findProduto = Product::all()->count();

        return $findProduto;
    }

    public function buscaTotalCliente() {
        $findCliente = Cliente::all()->count();

        return $findCliente;
    }
    public function buscaTotalVenda() {
        $findVenda = Venda::all()->count();

        return $findVenda;
    }

    public function buscaTotalUsuario() {
        $findUsuario = User::all()->count();

        return $findUsuario;
    }
}
