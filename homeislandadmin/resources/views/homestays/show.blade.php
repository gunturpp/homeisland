@extends('layout')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="pull-right" style="margin-top:15px;">
                        <a class="btn btn-primary" href="{{ route('homestays.index') }}"> Back</a>
                    </div>
                    <div class="col-lg-12">
                        <center><h1 class="page-header">Homestay Data Detail</h1></center>
                    </div>
            </div>
            {{--  <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('homestays.index') }}"> Back</a>
            </div>  --}}
        </div>
    </div>

    <div style="width: 80%; margin: auto;">
      	<table class="table centered">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Admin:</strong>
                        {{ $homestay->admin}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kabupaten:</strong>
                        {{ $homestay->kabupaten}}
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Homestay:</strong>
                        {{ $homestay->nama_homestay}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga:</strong>
                        {{ $homestay->price}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nomor Rekening:</strong>
                        {{ $homestay->no_rek}}
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
                        <strong>Fasilitas:</strong>
                        {{ $homestay->id_fasilitas}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Rating:</strong>
                        {{ $homestay->id_rating}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        {{ $homestay->address}}
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

        </table>
    </div>

@endsection