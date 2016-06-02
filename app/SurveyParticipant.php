<?php

namespace App;

use App\Survey;
use Illuminate\Database\Eloquent\Model;

class SurveyParticipant extends Model
{
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
