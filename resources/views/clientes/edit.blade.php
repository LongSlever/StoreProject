@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Atualizar cliente </h1>
</div>
<form action="{{route('cliente.edit',$cliente->id)}}" method="POST">
    @csrf
<div class="form-floating mb-3">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
    <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control @error('nome') is-invalid @enderror" id="Masc_nome" placeholder="Consultoria">
    <label for="nome">Nome</label>
    @if ($errors->has('nome'))
        <div class="invalid-feedback">
            {{$errors->first('nome')}}
        </div>
    @endif
  </div>
  </div>
  <div class="form-floating mb-3">
    <input name="email" value="{{ $cliente->email }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="8.40">
    <label for="email">E-mail</label>
    @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    @endif
  </div>
  <div class="form-floating mb-3">
    <input name="cep" value="{{ $cliente->cep }}" class="form-control @error('cep') is-invalid @enderror" id="cep" placeholder="8.40">
    <label for="cep">CEP</label>
  </div>
  <div class="form-floating mb-3">
    <input name="logradouro" value="{{ $cliente->logradouro }}" class="form-control @error('logradouro') is-invalid @enderror" id="logradouro" placeholder="8.40">
    <label for="logradouro">Logradouro</label>
  </div>
  <div class="form-floating mb-3">
    <input name="endereco" value="{{ $cliente->endereco }}" class="form-control @error('endereco') is-invalid @enderror" id="endereco" placeholder="8.40">
    <label for="endereco">Endereço</label>
  </div>
  <div class="form-floating mb-3">
    <input name="bairro" value="{{ $cliente->bairro }}" class="form-control @error('bairro') is-invalid @enderror" id="bairro" placeholder="8.40">
    <label for="bairro">Bairro</label>
  </div>
  <button type="submit" class="btn btn-success mt-2"> Cadastrar </button>
</form>
@endsection