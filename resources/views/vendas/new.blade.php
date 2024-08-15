@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar nova venda</h1>
</div>
<form action="{{route('venda.add')}}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" hidden name="numero_da_venda" value="{{ $numeracao }}" class="form-control @error('numero_da_venda') is-invalid @enderror" id="numero_da_venda" placeholder="numero_da_venda">
        @if ($errors->has('numero_da_venda'))
            <div class="invalid-feedback">
                {{$errors->first('numero_da_venda')}}
            </div>
        @endif
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" name="produto_id">
            <option selected>Selecione o produto</option>
            @foreach ($produtos as $produto)
            <option value="{{$produto->id}}">{{$produto->nome}}</option>
            @endforeach
          </select>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" name="cliente_id">
            <option selected>Selecione o cliente</option>
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
            @endforeach
          </select>
    </div>

        <button type="submit" class="btn btn-success mt-2"> Cadastrar </button>
</form>
@endsection