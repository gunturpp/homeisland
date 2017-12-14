    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kabupaten:</strong>
                {!! Form::text('kabupaten', null, array('placeholder' => 'Nama Kabupaten','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Homestay:</strong>
                {!! Form::text('nama_homestay', null, array('placeholder' => 'Nama Homestay','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                {!! Form::number('price', null, array('placeholder' => 'Harga','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Rekening:</strong>
                {!! Form::number('no_rek', null, array('placeholder' => 'Nomor Rekening','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kuota:</strong>
                {!! Form::number('kuota', null, array('placeholder' => 'kuota','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fasilitas:</strong>
                {!! Form::number('id_fasilitas', null, array('placeholder' => 'Fasilitas','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rating:</strong>
                {!! Form::number('id_rating', null, array('placeholder' => 'Rating','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {!! Form::textarea('address', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
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

        {{--  Upload Image  --}}

            {{--  <div class="row">
                <div class="col-md-6">
                    {!! Form::file('foto_1', array('class' => 'image')) !!}
                </div>  --}}

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group {!! $errors->has('foto_1') ? 'has-error' : '' !!}">
                <strong>Foto 1:</strong>
                {!! Form::file('foto_1') !!}
                {!! Form::label('foto_1', 'Gambar Harus Memiliki Format ( jpg,jpeg,png )*') !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group {!! $errors->has('foto_2') ? 'has-error' : '' !!}">
                <strong>Foto 2:</strong>
                {!! Form::file('foto_2') !!}
                {!! Form::label('foto_2', 'Gambar Harus Memiliki Format ( jpg,jpeg,png )*') !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group {!! $errors->has('foto_3') ? 'has-error' : '' !!}">
                <strong>Foto 3:</strong>
                {!! Form::file('foto_3') !!}
                {!! Form::label('foto_3', 'Gambar Harus Memiliki Format ( jpg,jpeg,png )*') !!}
            </div>
        </div>
        
        
        <br />
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>