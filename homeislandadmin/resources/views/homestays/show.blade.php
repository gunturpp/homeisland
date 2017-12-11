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
                <strong>Langitude:</strong>
                {{ $homestay->lang}}
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
                {{--  {{ Html::image('images/homestay/'. $homestay->foto_1, 'photo', ['class'=>'photo'])}}  --}}
                {{--  <img src='{{ 'images/homestay/' . $homestay->foto_1}}' />  --}}
                {{--  <img src="{{ asset('images/homestay/' . $homestay->foto_1) }}" alt="">  --}}
                {{--  <img src="{!! url('/images/homestay/' . $homestay->foto_1) !!}" alt="{{ $homestay->foto_11 }}">  --}}
                {{--  <img src="{{ URL::to('images/homestay/' . $homestay->foto_1) }}" alt="" class="img-responsive">  --}}
                {{--  <img src="{{ $homestay -> foto_1 }}" style="height:300px;width:300px;text-align:center">  --}}
                <img src="{{ asset('images/homestay/' . $homestay->image) }}" height="400" width="800" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 2:</strong>
                {{ $homestay->foto_2}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto 3:</strong>
                {{ $homestay->foto_3}}
            </div>
        </div>
    </div>
@endsection