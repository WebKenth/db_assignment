<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Survey;
use App\Choice;
use App\Question;
use App\Response;
use App\Question_Type;
use App\SurveyParticipant;

use Carbon\Carbon;

class survey_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Survey #1
        $survey = new Survey;
        $survey->title = 'hejsa';
        $survey->description = 'blabla';
        $survey->welcome_message = 'Whalecum';
        $survey->exit_message = 'Bum';
        $survey->start_date = Carbon::now('Europe/London');
        $survey->end_date = Carbon::now('Europe/London')->addWeek(1);
        $survey->save();

        /*
         Question Types
         */
        // Single_choice
        $question_1_type = new Question_Type;
        $question_1_type->name = "single_choice";
        $question_1_type->label = "Single Choice";
        $question_1_type->save();
        // Multiple_choice
        $question_2_type = new Question_Type;
        $question_2_type->name = "multiple_choice";
        $question_2_type->label = "Multiple Choice";
        $question_2_type->save();
        // Text
        $question_3_type = new Question_Type;
        $question_3_type->name = "text";
        $question_3_type->label = "Text";
        $question_3_type->save();
        // Rating
        $question_4_type = new Question_Type;
        $question_4_type->name = "rating";
        $question_4_type->label = "Rating";
        $question_4_type->save();

        // Question #1 Single Choice
        $question_1 = new Question;
        $question_1->title = 'The Big Single Choice Question';
        $question_1->description = 'The Big Single Choice Description';
        $question_1->required = true;
        $question_1->survey_id = $survey->id;
        $question_1->question_type_id = $question_1_type->id;
        $question_1->save();

            // Question #1 Choice #1
            $choice = new Choice;
            $choice->title = "Yes";
            $choice->description = '';
            $choice->question_id = $question_1->id;
            $choice->save();
            // Question #1 Choice #2
            $choice = new Choice;
            $choice->title = "No";
            $choice->description = '';
            $choice->question_id = $question_1->id;
            $choice->save();

        // Question #2 Multiple Choice
        $question_2 = new Question;
        $question_2->title = 'What Came First, The Egg or The Chicken?';
        $question_2->description = 'You may select as many options as possible';
        $question_2->required = true;
        $question_2->survey_id = $survey->id;
        $question_2->question_type_id = $question_2_type->id;
        $question_2->save();

            // Question #2 Choice #1
            $choice = new Choice;
            $choice->title = "The Chicken";
            $choice->description = '';
            $choice->question_id = $question_2->id;
            $choice->save();
            // Question #2 Choice #2
            $choice = new Choice;
            $choice->title = "The Egg";
            $choice->description = '';
            $choice->question_id = $question_2->id;
            $choice->save();
            // Question #2 Choice #3
            $choice = new Choice;
            $choice->title = "The Rabbit";
            $choice->description = '';
            $choice->question_id = $question_2->id;
            $choice->save();

        // Question #3 Text
        $question_3 = new Question;
        $question_3->title = 'Describe SQL in less than 1 Sentence';
        $question_3->description = 'Good Luck';
        $question_3->required = true;
        $question_3->survey_id = $survey->id;
        $question_3->question_type_id = $question_3_type->id;
        $question_3->save();

        // Question #4 Rating
        $question_4 = new Question;
        $question_4->title = 'Describe Morten in less than 1 Sentence';
        $question_4->description = 'Good Luck';
        $question_4->required = true;
        $question_4->survey_id = $survey->id;
        $question_4->question_type_id = $question_4_type->id;
        $question_4->save();


    }
}
