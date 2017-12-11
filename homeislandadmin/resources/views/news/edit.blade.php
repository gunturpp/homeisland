@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($newss, ['method' => 'PATCH','route' => ['news.update', $newss->id], 'files'=>true]) !!}
        @include('news.form')
    {!! Form::close() !!}

@endsection