@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="row">
        <div class="col-3">
            <list-room></list-room>
        </div>
        <div class="col-9">
            <chat></chat>
        </div>
    </div>
    </div>

@endsection
