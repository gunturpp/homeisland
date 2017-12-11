<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul Berita:</strong>
            {!! Form::text('judul', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi:</strong>
            {!! Form::textarea('deskripsi', null, array('placeholder' => 'Email, example@gmail.com','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">
    {!! Form::label('foto', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
    {!! Form::file('foto') !!}
    </div>
    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto:</strong>
            {!! Form::file('foto', null) !!}
        </div>
    </div> -->
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>