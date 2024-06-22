<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserTesteRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
        $users = User::paginate(15);
        // dd($users);

        return view('admin.users.indexTeste', compact('users'));
    }

    public function create(){
        return view('admin.users.createTeste');
    }

    public function store(StoreUserTesteRequest $request){
        // dd($request->all());
        User::create($request->all());

        return redirect()
        ->route('users.index')
        ->with('success', 'Uusário cadastrador com sucesso!'); // guarda essa informação na sessão e depois descarta
        //return 'Teste';
    }

    public function edit($id){

        //formas de fazer a busca de usuário por ID
        //$user = User::where('id','=', $id)->first(); // essa eu passo a forma de comparação explicitamente
        //$user = User::where('id', $id)->first(); // essa forma já entende que a forma de comparação é igual
        //$user = User::find($id); // essa forma também entender a forma de comparação por id

        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.indexTeste')
                ->with('message','Usuário não encontrado!');
        }


        return view('admin.users.editTeste',compact('user'));
    }

    public function update(Request $request, string $id){

        if (!$user = User::find($id)) {
            return back()->with('message','Usuário não encontrado!'); // retorna a página anterior
        }

        $user->update($request->only([
            'name',
            'email'
        ]));

        return redirect()
        ->route('users.index')
        ->with('success', 'Uusário cadastrador com sucesso!');
    }
}
