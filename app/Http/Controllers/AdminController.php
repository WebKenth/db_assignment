<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;
use App\Single_Choice_Response;
use App\Multiple_Choice_Response;
use App\Rating_Response;
use App\Text_Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('survey.admin.show_edit', compact('surveys'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats($id)
    {
        $survey = Survey::findOrFail($id);
//        dd($survey);
        $responses = array();
        foreach ($survey->questions as $question)
        {
            switch ($question->getQuestionType()->name) {
                case 'single_choice':
                    $single_choice = new Single_Choice_Response;
                    $single_choice_response = $single_choice::where('question_id', $question->id)->get();
                    $responses[] = $single_choice_response;
                    break;
                case 'multiple_choice':
                    $multiple_choice = new Multiple_Choice_Response;
                    $multiple_choice_response = $multiple_choice::where('question_id', $question->id)->get();
                    $responses[] = $multiple_choice_response;
                    break;
                case 'text':
                    $text = new Text_Response;
                    $text_response = $text::where('question_id', $question->id)->get();
                    $responses[] = $text_response;
                    break;
                case 'rating':
                    $rating = new Rating_Response;
                    $rating_response = $rating::where('question_id', $question->id)->get();
                    $responses[] = $rating_response;
                    break;
            }
        }
        return view('survey.admin.stats', compact('survey','responses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
