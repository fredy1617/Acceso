<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioPassRequest;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only'=>['index','destroy','create','edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::all();
        return view('Users.list',["usuarios"=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new User;
        if($request->hasFile('Foto')) {
            $file = $request->file('Foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/perfil/', $name);
            $usuario->Foto=$name;
        }
        $usuario->Nombre=$request->Nombre;
        $usuario->Apellidos=$request->Apellidos;        
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->Rol=$request->Rol;
        $usuario->Plantel=$request->Plantel;
        #se guarda el registro
        $usuario->save();
        if ($usuario->save()) {
            return redirect("/admin-userslist");
        }else{
            return view("Users.create");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario= User::find($id);
        return view('Users.edit',["usuario"=>$usuario]);
    }

    public function editpass($id)
    {
        $usuario= User::find($id);
        return view('Users.password',["usuario"=>$usuario]);
    }

     public function pass(UsuarioPassRequest $request, $id)
    {
        $usuario= User::find($id);
        $usuario->password=bcrypt($request->password);
        #se guarda el registro
        $usuario->save();
        if ($usuario->save()) {
            return redirect("/admin-userslist");
        }else{
            return view("Users.password");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario= User::find($id);
        if($request->hasFile('Foto')) {
            $file = $request->file('Foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/perfil/', $name);
            $usuario->Foto=$name;
        }
        $usuario->Nombre=$request->Nombre;
        $usuario->Apellidos=$request->Apellidos;
        $usuario->Correo=$request->Correo;
        $usuario->Rol=$request->Rol;
        $usuario->Plantel=$request->Plantel;
        #se guarda el registro
        $usuario->save();
        if ($usuario->save()) {
            return redirect("/admin-userslist");
        }else{
            return view("Users.edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {
        Usuario::destroy($usuario);
        return redirect('/admin-userslist');
    }
}
