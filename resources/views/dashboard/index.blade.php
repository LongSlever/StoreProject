@extends('index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produtos Cadastrados!</h5>
              <p class="card-text">Totais de produtos cadastrados no sistema.</p>
              <a href="#" class="btn btn-primary">{{$totaldeProduto}}</a>
              <a href="{{route('produtos.index')}}" class="btn btn-warning">Veja a lista</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Clientes cadastrados!</h5>
              <p class="card-text">Totais de clientes cadastrados no sistema.</p>
              <a href="#" class="btn btn-primary">{{$totaldeCliente}}</a>
              <a href="{{route('clientes.index')}}" class="btn btn-warning">Veja a lista</a>
            </div>
          </div>
        </div>
      </div>    
      <br>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendas realizadas!</h5>
              <p class="card-text">Totais de vendas realizadas no sistema.</p>
              <a href="#" class="btn btn-primary">{{$totaldeVenda}}</a>
              <a href="{{route('vendas.index')}}" class="btn btn-warning">Veja a lista</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuários cadastrados!</h5>
              <p class="card-text">Totais de usuários cadastrados no sistema.</p>
              <a href="#" class="btn btn-primary">{{$totaldeUsuario}}</a>
              <a href="{{route('usuarios.index')}}" class="btn btn-warning">Veja a lista</a>
            </div>
          </div>
        </div>
      </div>

@endsection