<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Event:</strong>
            {!! Form::text('judul', null, array('placeholder' => 'Nama Event','class' => 'form-control')) !!}
        </div>
    </div>

<<<<<<< HEAD
    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto_1') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_1', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_1') !!}
=======
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Start:</strong>
            {!! Form::text('date_start', null, array('placeholder' => 'dd/mm/yyyy','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date End:</strong>
            {!! Form::text('date_end', null, array('placeholder' => 'dd/mm/yyyy','class' => 'form-control')) !!}
        </div>
>>>>>>> 4c12a8ef7168df329a9fbac486402605aaf02d4f
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi Event:</strong>
            {!! Form::textarea('deskripsi', null, array('placeholder' => 'Deskripsi Event','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
<<<<<<< HEAD
=======
            <strong>Id Line:</strong>
            {!! Form::text('id_line', null, array('placeholder' => 'example : @homeisland','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id Instagram:</strong>
            {!! Form::text('id_ig', null, array('placeholder' => 'example : @homeisland','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Web:</strong>
            {!! Form::text('web', null, array('placeholder' => 'example : www.xxx.com','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
>>>>>>> 4c12a8ef7168df329a9fbac486402605aaf02d4f
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
        {{--  <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_1', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_1') !!}
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">  --}}
        {!! Form::label('foto_2', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
        {!! Form::file('foto_2') !!}
    </div>

    <div class="form-group">
        {{--  <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">  --}}
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