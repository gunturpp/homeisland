@include('layouts.app')

@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Souvenirs Detail</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('souvenir.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Toko Souvenir:</strong>
                {{ $souvenirs->nama_toko}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                {{--  {{ $newss->handphone_number}}  --}}
                <img src="{{ $souvenirs -> foto }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {{ $souvenirs->alamat}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Langitude:</strong>
                {{ $souvenirs->lang}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Longitude:</strong>
                {{ $souvenirs->long}}
            </div>
        </div>
    </div>
@endsection