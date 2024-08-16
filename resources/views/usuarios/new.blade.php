@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Criar novo usuario</h1>
</div>
<form action="{{route('usuario.add')}}" method="POST">
    @csrf
<div class="form-floating mb-3">
    <input type="text" name="nome" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror" id="Masc_nome" placeholder="Consultoria">
    <label for="nome">Nome</label>
    @if ($errors->has('nome'))
        <div class="invalid-feedback">
            {{$errors->first('nome')}}
        </div>
    @endif
  </div>
  <div class="form-floating mb-3">
    <input name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="8.40">
    <label for="email">E-mail</label>
    @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
    @endif
  </div>
  <div class="form-floating mb-3">
    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="8.40">
    <label for="password">Senha</label>
  </div>
  <button type="submit" class="btn btn-success mt-2"> Cadastrar </button>
</form>
@endsection