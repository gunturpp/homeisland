@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Recreation Spot</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('explore.index') }}"> Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($explores, ['method' => 'PATCH','route' => ['explore.update', $explores->id], 'files'=>true]) !!}
        @include('explore.form')
    {!! Form::close() !!}

@endsection