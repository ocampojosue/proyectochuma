<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::where('teacher_id', auth()->user()->id)->get();
        return view('profesor.evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::where('status', 'ACTIVE')->get();
        return view('profesor.evaluations.create', compact('themes'));
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
          'description' => 'required',
          'theme_id' => 'required',
          'date_evaluation' => 'required',
          'status' => 'required',
        ];
        $messages = [
          'description.required' => 'LA DESCRIPCIÓN ES REQUERIDA',
          'theme_id.required' => 'EL TEMA ES REQUERIDO',
          'date_evaluation.required' => 'LA FECHA ES REQUERIDA',
          'status.required' => 'EL ESTADO ES REQUERIDO',
        ];
        $this->validate($request, $rules, $messages);

        $evaluation = new Evaluation();
        $evaluation->description = Str::upper($request->description);
        $evaluation->theme_id = $request->theme_id;
        $evaluation->date_evaluation = $request->date_evaluation;
        $evaluation->status = $request->status;
        $evaluation->teacher_id = Auth::id();
        $evaluation->save();
        $data = array('success', 'EVALUACIÓN CREADA CORRECTAMENTE');
        Session::put('alerts', $data);
        return redirect()->route('profesor.evaluations.index');
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
    public function edit(Evaluation $evaluation)
    {
        $themes = Theme::where('status', 'ACTIVE')->get();
        return view('profesor.evaluations.edit', compact('themes', 'evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $rules = [
            'description' => 'required',
            'theme_id' => 'required',
            'date_evaluation' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'description.required' => 'LA DESCRIPCIÓN ES REQUERIDA',
            'theme_id.required' => 'EL TEMA ES REQUERIDO',
            'date_evaluation.required' => 'LA FECHA ES REQUERIDA',
            'status.required' => 'EL ESTADO ES REQUERIDO',
        ];
        $this->validate($request, $rules, $messages);

        $evaluation->description = Str::upper($request->description);
        $evaluation->theme_id = $request->theme_id;
        $evaluation->date_evaluation = $request->date_evaluation;
        $evaluation->status = $request->status;
        $evaluation->save();
        $data = array('success', 'EVALUACIÓN ACTUALIZADA');
        Session::put('alerts', $data);
        return redirect()->route('profesor.evaluations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        $data = array('error', 'EVALUACIÓN ELIMINADA');
        Session::put('alerts', $data);
        return redirect()->route('profesor.evaluations.index');
    }
}
