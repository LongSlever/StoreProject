{{-- Extendendo da index(página principal) --}}
@extends('index')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">clientes</h1>
</div>
<div>
    <form action="{{route ('clientes.index')}}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button type="submit">Pesquisar</button>
        <a href="{{route('cliente.add')}}" type="button" class="btn btn-success float-end">
            Incluir Cliente
        </a>
    </form>
</div>
<div class="table-responsive mt-4">
    @if($finClientes->isEmpty())
      <p>Não existe dados</p>
    @endif
    
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th >Nome</th>
            <th >Valor</th>
            <th >Ações</th>
          </tr>
        </thead>
      
          
      
        <tbody>
          @foreach ($findClientes as $cliente)
          <tr>
            <td>{{$cliente->nome}}</td>
            <td>{{"R$" . ' '. number_format($cliente->valor, 2, ',', '.')}}</td>
            <td>
                <a href="{{route ('cliente.edit', $cliente->id)}}" class="btn btn-warning btn-sm">Editar</a>
                <meta name="csrf-token" content="{{csrf_token() }}" />
                <a onclick="deleteRegistroPaginacao('{{route('cliente.delete')}}', {{ $cliente->id }})" class="btn btn-danger btn-sm">Excluir</a>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection