@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Homestay's Detail</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('homestays.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Homestay:</strong>
                {{ $homestay->nama_homestay}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                {{ $homestay->harga}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kuota:</strong>
                {{ $homestay->kuota}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Latitude:</strong>
                {{ $homestay->lat}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Longitude:</strong>
                {{ $homestay->long}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 1:</strong>
                <img src="{{ $homestay -> foto_1 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 2:</strong>
                <img src="{{ $homestay -> foto_2 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 3:</strong>
                <img src="{{ $homestay -> foto_3 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>
    </div>
@endsection