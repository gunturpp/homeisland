{{--  {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}  --}}
{{--  <form action="/images" method="post" enctype="multipart/form-data">  --}}
{{--  {!! Form::open(array('url'=>'items','class'=>'register-form','files'=>true)) !!}      --}}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Homestay:</strong>
                {!! Form::text('nama_homestay', null, array('placeholder' => 'Nama Homestay','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                {!! Form::number('harga', null, array('placeholder' => 'harga','class' => 'form-control')) !!}
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
                <div class="form-horizontal ">
                    <strong>Foto 1:</strong>
                    {!! Form::file('foto_1', array('class' => 'image')) !!}
                    {{--  {!! Form::file('frontimage') !!}  --}}
                </div>
                <br />
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-horizontal">
                    <strong>Foto 2:</strong>
                    {!! Form::file('foto_2', null, array('class' => 'image')) !!}
                </div>
                <br />
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-horizontal">
                    <strong>Foto 3:</strong>
                    {!! Form::file('foto_3', null, array('class' => 'image')) !!}
                </div>
            </div>

            <br />

            {{--  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                    @endif  --}}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{--  <br />
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>  --}}

        
        <br />
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

{{--  {!! Form::close() !!}    --}}
{{--  </form>  --}}

</div>