<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('profesor.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluations = Evaluation::where('status','ACTIVE')->get();
        return view('profesor.questions.create', compact('evaluations'));
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
            'name' => 'required|unique:questions,name|min:5|max:150',
            'evaluation_id' => 'required',
            'options.*' => 'required',
        ];
        $messages = [
            'name.required' => 'La Pregunta es requerida',
            'name.required' => 'La Pregunta de la Evaluación es requerido',
            'name.unique' => 'La Pregunta de la Evaluación ya existe',
            'name.min' => 'La Pregunta de la Evaluación debe tener al menos 5 caracteres',
            'name.max' => 'La Pregunta de la Evaluación debe tener a lo sumo 150 caracteres',
            'evaluation_id.required' => 'Elige una Evaluacion',
            'options.*.required' => 'Las Opciones son requeridas',
        ];
        // dd($request->all());
        $this->validate($request, $rules, $messages);
        $topicID = $request->input('evaluation_id');
        $questionText = $request->input('name');
        $optionArray = $request->input('options');
        $correctOptions = $request->input('correct');

        $question = new Question();
        $question->name = Str::upper($questionText);
        $question->evaluation_id = $topicID;
        $question->save();

        $questionToAdd = Question::latest()->first();;
        $questionID = $questionToAdd->id;

        foreach ($optionArray as $index => $opt) {
            $option = new Option();
            $option->question_id = $questionID;
            $option->option = Str::upper($opt);
            foreach ($correctOptions as $correctOption) {
                if ($correctOption == $index + 1) {
                    $option->correct = 10;
                }
            }

            $option->save();
        }
        $data = array('success', 'PREGUNTAS AGREGADAS');
        Session::put('alerts', $data);
        return redirect()->route('profesor.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $options = Option::where('question_id', $question->id)->get();
        return view('profesor.questions.show', compact('question', 'options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
