<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Event:</strong>
            {!! Form::text('judul', null, array('placeholder' => 'Nama Event','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto_1') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_1', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_1') !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi Event:</strong>
            {!! Form::textarea('deskripsi', null, array('placeholder' => 'Deskripsi Event','class' => 'form-control')) !!}
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