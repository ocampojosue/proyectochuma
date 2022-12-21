<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // Session::forget('alerts');
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'name.required' => 'EL NOMBRE ES REQUERIDO',
            'email.required' => 'EL CORREO ES REQUERIDO',
            'status.required' => 'EL ESTADO ES REQUERIDO',
            'password.required' => 'LA CONTRASEÑA ES REQUERIDO',
        ];
        //FORMAS DE VALIDAR EL FORM
        // $this->validate($request, $rules, $messages);
        $request->validate($rules, $messages);
        $user = new User();
        $user->name = Str::upper($request->name);
        $user->email = Str::upper($request->email);
        $user->status = $request->status;
        $user->password = bcrypt($request->password);
        $user->save();
        // User::create([
        //     'name' => Str::upper($request->name),
        //     'email' => Str::upper($request->email),
        //     'status' => $request->status,
        //     'password' => bcrypt($request->password),
        // ]);
        $data = array('success', 'USUARIO CREADO CORRECTAMENTE');
        Session::put('alerts', $data);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // return $request;
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'EL NOMBRE ES REQUERIDO',
            'email.required' => 'EL CORREO ES REQUERIDO',
            'status.required' => 'EL ESTADO ES REQUERIDO',
        ];
        $request->validate($rules, $messages);

        $user->name = Str::upper($request->name);
        $user->email = Str::upper($request->email);
        $user->status = $request->status;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $data = array('success', 'USUARIO ACTUALIZADO CORRECTAMENTE');
        Session::put('alerts', $data);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $data = array('error', 'USUARIO ELIMINADO');
        Session::put('alerts', $data);
        return redirect()->route('admin.users.index');
    }
}
