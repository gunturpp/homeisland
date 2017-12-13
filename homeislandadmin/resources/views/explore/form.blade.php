<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kabupaten:</strong>
            {!! Form::text('kabupaten', null, array('placeholder' => 'kabupaten','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kategori:</strong>
            {!! Form::text('category', null, array('placeholder' => 'Kategori','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Tempat Wisata:</strong>
            {!! Form::text('nama_tempat', null, array('placeholder' => 'Kategori','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Open Sale:</strong>
            {!! Form::text('open_sale_hour', null, array('placeholder' => 'Jam, example : 08, 13','class' => 'form-control')) !!}
            {!! Form::text('open_sale_minute', null, array('placeholder' => 'menit, example : 01, 59','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Closed Sale:</strong>
            {!! Form::text('close_sale_hour', null, array('placeholder' => 'Jam, example : 08, 13','class' => 'form-control')) !!}
            {!! Form::text('close_sale_minute', null, array('placeholder' => 'menit, example : 01, 59','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            {!! Form::textarea('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Latitude:</strong>
            {!! Form::text('lat', null, array('placeholder' => 'Latitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitude:</strong>
            {!! Form::text('long', null, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto_1') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_1', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_1') !!}
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto_2') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_2', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_2') !!}
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto_3') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_3', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_3') !!}
    </div>

    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto:</strong>
            {!! Form::file('foto', null) !!}
        </div>
    </div> -->
{{--  
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  --}}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>