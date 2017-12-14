@extends('layout')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="pull-right" style="margin-top:15px;">
                        <a class="btn btn-primary" href="{{ route('explore.index') }}"> Back</a>
                    </div>
                    <div class="col-lg-12">
                        <center><h1 class="page-header">Explore Data Detail</h1></center>
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
                        <strong>Kabupaten:</strong>
                        {{ $explores->kabupaten}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        {{ $explores->category}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Tempat Wisata:</strong>
                        {{ $explores->nama_tempat}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Open Sale:</strong>
                        {{ $explores->open_sale_hour}}
                        :
                        {{ $explores->open_sale_minute}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Closed Sale:</strong>
                        {{ $explores->close_sale_hour}}
                        :
                        {{ $explores->close_sale_minute}}
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
                        <strong>Latitude:</strong>
                        {{ $explores->lat}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Longitude:</strong>
                        {{ $explores->long}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 1:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $explores -> foto_1 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 2:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $explores -> foto_2 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 3:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $explores -> foto_3 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>

            </div>
        </table>
    </div>

@endsection