<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestUsuario;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected $usuario;
    
    public function __construct(User $usuario) {
        $this->usuario = $usuario;
    }


    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $findUsuarios = $this->usuario->getUsuariosPesquisarIndex(search : $pesquisar ?? '');
        return view('usuarios.index', compact('findUsuarios'));
    }

   

    public function create(FormRequestUsuario $request) {
        if($request->method() == 'POST') {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            Toastr::success('Cadastrado com sucesso');
            return redirect()->route('usuarios.index');
        }
        
        return view('usuarios.new');
    }


    public function edit(FormRequestUsuario $request, int $id)
    {
        if($request->method() == 'PUT') {
            
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $buscarRegistro = User::find($id);
            $buscarRegistro->update($data);

            return redirect()->route('usuarios.index');

        }

        $usuario = User::where('id', '=', $id)->first();

        return view('usuarios.edit', compact('usuario'));
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = User::find($id);
        $buscarRegistro->delete();
        return response()->json(['success' => true]);
    }

};