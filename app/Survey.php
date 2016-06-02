<?php

namespace App;

use App\SurveyParticipant;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function survey_participants()
    {
        return $this->hasMany(SurveyParticipant::class);
    }

    public function addSurveyParticipant(SurveyParticipant $survey_participant)
    {
        return $this->survey_participants()->save($survey_participant);
    }
}
