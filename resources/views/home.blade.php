@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Surveys
                </div>

                <div class="panel-body">
                <h6>List of Surveys</h6>
                @include('survey.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
