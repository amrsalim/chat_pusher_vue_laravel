@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-9">
                <chat :user="{{auth()->user()}}" :id="{{$id ?? ""}}"></chat>
            </div>
        </div>
    </div>

@endsection
