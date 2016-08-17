@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Der er {{count($responses)/4}} der har svaret på spørgeskemaet</p>
            </div>
        </div>
    </div>
@endsection