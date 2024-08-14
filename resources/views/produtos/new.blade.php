@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar novo produto</h1>
</div>
<form action="{{route('produto.add')}}" method="POST">
    @csrf
<div class="form-floating mb-3">
    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="Masc_nome" placeholder="Consultoria">
    <label for="nome">Nome</label>
    @if ($errors->has('nome'))
        <div class="invalid-feedback">
            {{$errors->first('nome')}}
        </div>
    @endif
  </div>
  <div class="form-floating">
    <input type="number" name="valor"  class="form-control @error('valor') is-invalid @enderror" id="Masc_valor" placeholder="8.40">
    <label for="nome">Valor</label>
    @if ($errors->has('valor'))
        <div class="invalid-feedback">
            {{$errors->first('valor')}}
        </div>
    @endif
  </div>
  <button type="submit" class="btn btn-success mt-2"> Cadastrar </button>
</form>
@endsection