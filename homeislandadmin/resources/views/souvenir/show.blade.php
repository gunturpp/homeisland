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
                <strong>Open Sale:</strong>
                {{ $souvenirs->open_sale_hour}}
                :
                {{ $souvenirs->open_sale_minute}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Closed Sale:</strong>
                {{ $souvenirs->close_sale_hour}}
                :
                {{ $souvenirs->close_sale_minute}}
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
                <strong>Latitude:</strong>
                {{ $souvenirs->lat}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Longitude:</strong>
                {{ $souvenirs->long}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 1:</strong>
                {{--  {{ $newss->handphone_number}}  --}}
                <img src="{{ $souvenirs -> foto_1 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 2:</strong>
                {{--  {{ $newss->handphone_number}}  --}}
                <img src="{{ $souvenirs -> foto_2 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 3:</strong>
                {{--  {{ $newss->handphone_number}}  --}}
                <img src="{{ $souvenirs -> foto_3 }}" style="height:50px;width:50px;text-align:center">
            </div>
        </div>

    </div>
@endsection