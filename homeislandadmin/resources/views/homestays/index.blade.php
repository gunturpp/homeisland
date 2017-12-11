<!DOCTYPE html>
<html>
@include('dashboard.header')
    <style>
        .photo{
            width:30px;
            heigth:30px;
            border-radius: 50px 50px 50px 50px;
        }
    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Homestay
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Homestay</li>
      </ol>
    </section>
 
    <section class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Homestay Input Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('homestays.create') }}"> Create New Homestay</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        
        <img src="images/{{ Session::get('image') }}">
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Homestay</th>
            <th>Harga</th>
            <th>Kuota</th>
            <th>Langitude</th>
            <th>Longitude</th>
            <th>Foto1</th>
            <th>Foto2</th>
            <th>Foto3</th>
            <th width="140px">Action</th>
        </tr>
    @foreach ($homestays as $homestay)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $homestay->nama_homestay}}</td>
        <td>{{ $homestay->harga}}</td>
        <td>{{ $homestay->kuota}}</td>
        <td>{{ $homestay->lang}}</td>
        <td>{{ $homestay->long}}</td>
        <td><img src="{{ $homestay -> foto_1 }}" style="height:50px;width:50px;text-align:center"></td>
        <td><img src="{{ $homestay -> foto_2 }}" style="height:50px;width:50px;text-align:center"></td>
        <td><img src="{{ $homestay -> foto_3 }}" style="height:50px;width:50px;text-align:center"></td>
        <td>
            <a class="btn btn-info" href="{{ route('homestays.show',$homestay->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('homestays.edit',$homestay->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['homestays.destroy', $homestay->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $homestays->links() !!}

</section>
</div>

@include('dashboard.footer') 
</body>
</html>
