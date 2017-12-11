<!DOCTYPE html>
<html>
@include('dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Explore
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Explore</li>
      </ol>
    </section>
 
    <section class="content">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Explore Recreation list</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('explore.create') }}"> Create New Explore</a>
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
                    <th>Nama Tempat Wisata</th>
                    {{--  <th>Writter</th>  --}}
                    <th>Foto</th>
                    <th>Alamat</th>
                    <th>Langitude</th>
                    <th>Latitude</th>
                    <th width="280px">Action</th>
                </tr>
            @foreach($explores as $explore)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $explore->nama_wisata}}</td>
                <td><img src="{{ $explore -> foto }}" style="height:50px;width:50px;text-align:center"></td>
                <td>{{ $explore->alamat}}</td>
                <td>{{ $explore->lang}}</td>
                <td>{{ $explore->long}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('explore.show',$explore->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('explore.edit',$explore->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['explore.destroy', $explore->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>
            
            {!! $explores->links() !!}
    </section>
</div>

@include('dashboard.footer') 
</body>
</html>
