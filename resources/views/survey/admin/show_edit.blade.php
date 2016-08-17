@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('survey-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('survey-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
        </div>
        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('question-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('question-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
        </div>
        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('choice-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('choice-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
        </div>
        <div class="col-md-12">
            <ul class="list-group">
                <h3>Surveys</h3>
            @foreach($surveys as $survey)
                <li class="list-group-item">
                    <div class="survey_container">
                        <form class="form-update" action="/survey/{{ $survey->id }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('patch') !!}
                            <input class="lilletekstbox2" type="text" name="title" value="{{$survey->title}}">
                            <br>
                            <textarea class="textareacssbymortentheKING" name="description" cols="30" rows="3">{{$survey->description}}</textarea>
                            <br>
                            <button class="knappenoverallesnapper" type="submit">Rediger</button>
                        </form>
                        <ul class="list-group">
                            @foreach($survey->questions as $question)
                            <li class="list-group-item">
                            <h4>Question</h4>
                                <form class="form-update" action="/question/{{ $question->id }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('patch') !!}
                                    <input class="lilletekstbox2" type="text" name="title" value="{{$question->title}}">
                                    <br>
                                    <textarea class="textareacssbymortentheKING" name="description" cols="30" rows="2">{{$question->description}}</textarea>
                                    <br>
                                    <button class="knappenoverallesnapper" type="submit">Rediger</button>
                                </form>
                                    @if(count($question->choices) >= 1)
                                        <ul class="list-group">
                                            <h5>Choices</h5>
                                            @foreach($question->choices as $choice)
                                                <li class="list-group-item">
                                                    <form class="form-update" action="/choice/{{ $choice->id }}" method="POST">
                                                        {!! csrf_field() !!}
                                                        {!! method_field('patch') !!}
                                                        <input class="lilletekstbox2" type="text" name="title" value="{{ $choice->title }}">
                                                        <br>
                                                        <textarea class="textareacssbymortentheKING" name="description" cols="30" rows="1">{{$choice->description}}</textarea>
                                                        <br>
                                                        <button class="knappenoverallesnapper" type="submit">Rediger</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                <hr>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
