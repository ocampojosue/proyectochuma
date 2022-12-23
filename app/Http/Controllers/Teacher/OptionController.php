<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function edit(Option $option)
    {
        return view('profesor.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        $rules = [
            'option' => 'required',
            'correct' => 'required',
        ];
        $messages = [
            'option.required' => 'LA OPCIÓN ES REQUERIDA',
            'correct.required' => 'EL PUNTAJE ES REQUERIDO',
        ];
        // dd($request->all());
        $this->validate($request, $rules, $messages);
        $option->option = Str::upper($request->option);
        $option->correct = Str::upper($request->correct);
        $option->save();
        $data = array('success', 'OPCIÓN ACTUALIZADA');
        Session::put('alerts', $data);
        return redirect()->route('profesor.questions.show', $option->question_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $question = Question::where('id', $option->question_id)->first();    
        $option->delete();
        $data = array('error', 'OPCIÓN ELIMINADA');
        Session::put('alerts', $data);
        return redirect()->route('profesor.questions.show', $question->id);
    }
}
