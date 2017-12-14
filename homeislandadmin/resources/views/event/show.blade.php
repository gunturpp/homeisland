@extends('layout')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="pull-right" style="margin-top:15px;">
                        <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
                    </div>
                    <div class="col-lg-12">
                        <center><h1 class="page-header">Event Data Detail</h1></center>
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
                        <strong>Nama Event:</strong>
                        {{ $events->judul}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date Start:</strong>
                        {{ $events->date_start}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Date End:</strong>
                        {{ $events->date_end}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi:</strong>
                        {{ $events->deskripsi}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Line:</strong>
                        {{ $events->id_line}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Id Instagram:</strong>
                        {{ $events->id_ig}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>web:</strong>
                        {{ $events->web}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Latitude:</strong>
                        {{ $events->lat}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Longitude:</strong>
                        {{ $events->long}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 1:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $events -> foto_1 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 2:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $events -> foto_2 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto 3:</strong>
                        {{--  {{ $newss->handphone_number}}  --}}
                        <img src="{{ $events -> foto_3 }}" style="height:50px;width:50px;text-align:center">
                    </div>
                </div>

            </div>
        </table>
    </div>

@endsection