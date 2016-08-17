<?php

namespace App;

use App\SurveyParticipant;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function survey_participants()
    {
        return $this->hasMany(SurveyParticipant::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function retrieveResponses()
    {
        $responses = array();
        $questions = $this->questions()->getResults();
        foreach ($questions as $question)
        {
            $responses[] = $question->response;
        }
        return $responses;
    }
}

