@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Souvenir</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('souvenir.index') }}"> Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($souvenirs, ['method' => 'PATCH','route' => ['souvenir.update', $souvenirs->id], 'files'=>true]) !!}
        @include('souvenir.form')
    {!! Form::close() !!}

@endsection