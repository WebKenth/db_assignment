<?php

namespace App;

use App\Question_Type;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function type()
    {
        return $this->hasOne(Question_Type::class);
    }
}
