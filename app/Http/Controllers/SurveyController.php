<?php

namespace App\Http\Controllers;

use App\Response;
use App\Survey;
use App\Question;
use App\Choice;
use App\Single_Choice_Response;
use App\Multiple_Choice_Response;
use App\Text_Response;
Use App\Rating_Response;
use App\SurveyParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        return view('home', compact('surveys'));
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
        $survey = Survey::findOrFail($request->survey_id);

        $user = Auth::user();

        // create Survey_participant
        $survey_participant = new SurveyParticipant;
        $survey_participant->user_id = $user->id;
        $survey_participant->survey_id = $survey->id;
        $survey_participant->email = $user->email;
        $survey_participant->save();

        // Create Response
        $response = new Response;
        $response->user_id = $survey_participant->user_id;
        $response->survey_id = $survey->id;
        $response->save();

        // Create Question_responses foreach question based on question_type
        $c = 1;
        foreach ($survey->questions as $question)
        {
            $question_response = $request['response_'.$c];
//            dd($question->getQuestionType()->name);
            switch ($question->getQuestionType()->name) {
                case 'single_choice':
                    $single_choice = new Single_Choice_Response;
                    $single_choice->response_id = $response->id;
                    $single_choice->question_id = $question->id;
                    $single_choice->choice_id = $question_response[0];
//                    dd($single_choice);
                    $single_choice->save();
                    break;
                case 'multiple_choice':
                    foreach ($question_response as $multiple_choice_response)
                    {
                        $multiple_choice = new Multiple_Choice_Response;
                        $multiple_choice->question_id = $question->id;
                        $multiple_choice->response_id = $response->id;
                        $multiple_choice->choice_id = $multiple_choice_response;
                        $multiple_choice->save();
                    }
                    break;
                case 'text':
                    $text = new Text_Response;
                    $text->response_id = $response->id;
                    $text->question_id = $question->id;
                    $text->response = $question_response;
                    $text->save();
                    break;
                case 'rating':
                    $rating = new Rating_Response;
                    $rating->response_id = $response->id;
                    $rating->question_id = $question->id;
                    $rating->response = $question_response;
                    $rating->save();
                    break;
            }
            $c++;
        }

        return redirect('/survey/exit_message/'.$survey->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::findOrFail($id);
//        dd($survey);
        $questions = $survey->questions;
        return view('survey.show', compact('survey','questions'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exit_message($id)
    {
        $survey = Survey::findOrFail($id);
        return view('survey.exit_message', compact('survey'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:surveys'
        ]);
        if ($validator->fails()) {
            $request->session()->flash('survey-danger', 'Survey Was Not Changed');
            return redirect('/admin/')
                    ->withErrors($validator);
        }
        $survey = Survey::findOrFail($id);
        $survey->title = $request->title;
        $survey->description = $request->description;
        $survey->save();
        $request->session()->flash('survey-success', 'Survey Was Successfully Changed');
        return redirect('/admin');
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
