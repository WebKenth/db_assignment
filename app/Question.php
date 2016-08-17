<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Question_Type;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Parser\Multiple;

class Question extends Model
{
    public function getQuestionType()
    {
        $question_type = DB::table('question_types')->where('id', $this->question_type_id)->first();
        return $question_type;
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function response()
    {
        $question_type = $this->getQuestionType();
        switch($question_type->name){
            case 'text':
                return $this->hasOne(Text_Response::class);
            break;
            case 'rating':
                return $this->hasOne(Rating_Response::class);
            break;
            case 'single_choice':
                return $this->hasOne(Single_Choice_Response::class);
            break;
            case 'multiple_choice':
                return $this->hasMany(Multiple_Choice_Response::class);
            break;
        }
        return null;
    }
}
