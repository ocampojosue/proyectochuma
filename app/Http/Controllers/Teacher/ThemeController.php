<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        return view('profesor.themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rules = [
          'name' => 'required',
          'status' => 'required',
        ];
        $messages = [
          'name.required' => 'EL NOMBRE DEL TEMA ES REQUERIDO',
          'status.required' => 'EL ESTADO DEL TEMA ES REQUERIDO',
        ];
        $this->validate($request, $rules, $messages);
        $theme = new Theme();
        $theme->name = Str::upper($request->name);
        $theme->status = $request->status;
        $theme->teacher_id = Auth::id();
        $theme->save();
        $data = array('success', 'TEMA CREADO CORRECTAMENTE');
        Session::put('alerts', $data);
        return redirect()->route('profesor.themes.index');
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
    public function edit(Theme $theme)
    {
        return view('profesor.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $rules = [
            'name' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'EL NOMBRE DEL TEMA ES REQUERIDO',
            'status.required' => 'EL ESTADO DEL TEMA ES REQUERIDO',
        ];
        $this->validate($request, $rules, $messages);

        $theme->name = Str::upper($request->name);
        $theme->status = $request->status;
        $theme->save();
        $data = array('success', 'TEMA ACTUALIZADO CORRECTAMENTE');
        Session::put('alerts', $data);
        return redirect()->route('profesor.themes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        $data = array('error', 'TEMA ELIMINADO');
        Session::put('alerts', $data);
        return redirect()->route('profesor.themes.index');
    }
}
