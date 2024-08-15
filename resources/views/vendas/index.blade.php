{{-- Extendendo da index(página principal) --}}
@extends('index')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>
<div>
    <form action="{{route ('vendas.index')}}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button type="submit">Pesquisar</button>
        <a href="{{route('venda.add')}}" type="button" class="btn btn-success float-end">
            Incluir venda
        </a>
    </form>
</div>
<div class="table-responsive mt-4">
    @if($findVendas->isEmpty())
      <p>Não existe dados</p>
    @endif
    
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th >Número da Venda </th>
            <th >Nome do Cliente</th>
            <th >Produto</th>
            <th >Valor</th>
            <th >Ações</th>
          </tr>
        </thead>
      
          
      
        <tbody>
          @foreach ($findVendas as $venda)
          <tr>
            <td>{{$venda->numero_da_venda}}</td>
            <td>{{$venda->cliente->nome}}</td>
            <td>{{$venda->produto->nome}}</td>
            <td>{{$venda->produto->valor}}</td>
            <td>
                <a href="{{route ('venda.show', $venda->numero_da_venda)}}" class="btn btn-primary btn-sm">Ver</a>
                <meta name="csrf-token" content="{{csrf_token() }}"/>
                <a onclick="deleteRegistroPaginacao('{{route('venda.delete')}}', {{ $produto->id }})" class="btn btn-danger btn-sm">Excluir</a> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection