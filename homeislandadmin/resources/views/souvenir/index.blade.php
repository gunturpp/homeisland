<!DOCTYPE html>
<html>
@include('dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Souvenir
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Souvenir</li>
      </ol>
    </section>
 
    <section class="content">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Souvenir list</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('souvenir.create') }}"> Create New Souvenir</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Toko Souvenir</th>
                    {{--  <th>Writter</th>  --}}
                    <th>Foto</th>
                    <th>Alamat</th>
                    <th>Langitude</th>
                    <th>Latitude</th>
                    <th width="280px">Action</th>
                </tr>
            @foreach($souvenirs as $souvenir)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $souvenir->nama_toko}}</td>
                <td><img src="{{ $souvenir -> foto_1 }}" style="height:50px;width:50px;text-align:center"></td>
                <td>{{ $souvenir->alamat}}</td>
                <td>{{ $souvenir->lat}}</td>
                <td>{{ $souvenir->long}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('souvenir.show',$souvenir->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('souvenir.edit',$souvenir->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['souvenir.destroy', $souvenir->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>
            
            {!! $souvenirs->links() !!}
    </section>
</div>

@include('dashboard.footer') 
</body>
</html>
