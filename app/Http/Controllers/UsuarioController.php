<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('id','desc')->paginate(50);
        return view('admin.usuario.index',['usuarios'=> $usuarios]);
    }

    public function create()
    {
        return view('admin.usuario.create');
    }
    public function store(Request $request)
    {
        
    }
    public function show(User $usuario)
    {
        return view('admin.profesor.show',['profesor'=> $profesor]);
    }
    public function edit(User $usuario)
    {
        $roleUsuario = DB::table('role_user')
            ->where('user_id','=', $usuario->id)
            ->first();
        return view('admin.usuario.edit', compact('usuario', 'roleUsuario'));
    }
    public function update(Request $request, User $usuario)
    {
        $roleUsuario = DB::table('role_user')
            ->where('user_id','=', $usuario->id)
            ->first();
        $selectedRole = Role::where('id',$request->role)->first();
        $usuario->roles()->detach($roleUsuario->role_id);
        $usuario->roles()->attach($selectedRole);
        return redirect()->route('usuario.index')->with('success','Usuario actualizado.');
    }
    public function destroy(User $usuario)
    {
        
    }

}
