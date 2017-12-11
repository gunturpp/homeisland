@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Recreation Spot</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('explore.index') }}"> Back</a>
            </div>
        </div>
    </div>
    
    {!! Form::open(['route' => 'explore.store','method'=>'POST','files'=>true]) !!}
         @include('explore.form')
    {!! Form::close() !!}

@endsection