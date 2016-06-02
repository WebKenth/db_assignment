@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Surveys</div>

                <div class="panel-body">
                <p>List of Surveys</p>
                @include('survey.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
