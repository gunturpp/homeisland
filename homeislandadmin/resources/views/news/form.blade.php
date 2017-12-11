<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul Berita:</strong>
            {!! Form::text('judul', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    {{--  <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Writter:</strong>
            {!! Form::text('admin', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>  --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi:</strong>
            {!! Form::textarea('deskripsi', null, array('placeholder' => 'Email, example@gmail.com','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
    {{--  <div class="form-group {!! $errors->has('foto') ? 'has-error' : '' !!}">  --}}
    {!! Form::label('foto', 'Gambar Penunjang ( jpg,jpeg,png )*') !!}
    {!! Form::file('foto') !!}
    </div>
    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto:</strong>
            {!! Form::file('foto', null) !!}
        </div>
    </div> -->

    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>