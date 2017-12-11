<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Toko Souvenir:</strong>
            {!! Form::text('nama_toko', null, array('placeholder' => 'Nama Toko Souvenir','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto') !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            {!! Form::textarea('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Langitude:</strong>
            {!! Form::text('lang', null, array('placeholder' => 'Langitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitude:</strong>
            {!! Form::text('long', null, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
        </div>
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