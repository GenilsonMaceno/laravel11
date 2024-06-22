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
}
