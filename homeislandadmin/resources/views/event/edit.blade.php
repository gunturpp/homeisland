@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Event</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($events, ['method' => 'PATCH','route' => ['event.update', $events->id], 'files'=>true]) !!}
        @include('event.form')
    {!! Form::close() !!}

@endsection