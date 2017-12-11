<!DOCTYPE html>
<html>
@include('dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">News</li>
      </ol>
    </section>
 
    <section class="content">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>News list</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('news.create') }}"> Create New News</a>
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
                    <th>Judul</th>
                    {{--  <th>Writter</th>  --}}
                    {{--  <th>Password</th>  --}}
                    <th>admin</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th width="280px">Action</th>
                </tr>
            @foreach($newss as $news)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $news->judul}}</td>
                <td>{{ $news->admin}}</td>
                {{--  <td>{{ $news->foto}}</td>  --}}
                <td>{{ $news->deskripsi}}</td>
                <td><img src="{{ $news -> foto }}" style="height:50px;width:50px;text-align:center"></td>
                <td>
                    <a class="btn btn-info" href="{{ route('news.show',$news->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('news.edit',$news->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['news.destroy', $news->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>
            
            {!! $newss->links() !!}
    </section>
</div>
</body>
</html>
