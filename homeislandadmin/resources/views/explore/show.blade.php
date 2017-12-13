@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show News Detail</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('explore.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>admin:</strong>
                {{ $explores->admin}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Tempat:</strong>
                {{ $explores->nama_tempat}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                {{--  {{ $explores->foto_1}}  --}}
                <img src="{{ $explores -> foto_1 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                {{--  {{ $explores->foto_2}}  --}}
                <img src="{{ $explores -> foto_2 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                {{--  {{ $explores->foto_3}}  --}}
                <img src="{{ $explores -> foto_3 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {{ $explores->alamat}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Langitude:</strong>
                {{ $explores->lat}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Longitude:</strong>
                {{ $explores->long}}
            </div>
        </div>
    </div>
@endsection