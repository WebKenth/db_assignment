@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-update" action="/survey" method="POST">
                <input type="hidden" name="survey_id" value="{{$survey->id}}">
            {!! csrf_field() !!}
                <ul class="list-group">
                    @foreach($questions as $question)
                    <li class="list-group-item">
                        @if($question->getQuestionType()->name == 'single_choice')
                            @include('survey.question.single_choice')
                        @endif
                        @if($question->getQuestionType()->name == 'multiple_choice')
                            @include('survey.question.multiple_choice')
                        @endif
                        @if($question->getQuestionType()->name == 'text')
                            @include('survey.question.text')
                        @endif
                            @if($question->getQuestionType()->name == 'rating')
                            @include('survey.question.rating')
                        @endif
                    </li>
                        <hr>
                        <br>
                    @endforeach
                </ul>
            <button type="submit">Indsend Svar</button>
            </form>
        </div>
    </div>
</div>
@endsection