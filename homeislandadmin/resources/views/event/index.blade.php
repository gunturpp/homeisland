<!DOCTYPE html>
<html>
@include('dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>
    </section>
 
    <section class="content">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Event list</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('event.create') }}"> Create New Event</a>
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
                    <th>Nama Event</th>
                    {{--  <th>Writter</th>  --}}
                    <th>Foto</th>
                    <th>Deskripsi Event</th>
                    <th>Langitude</th>
                    <th>Latitude</th>
                    <th width="280px">Action</th>
                </tr>
            @foreach($events as $event)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $event->judul}}</td>
                <td><img src="{{ $event -> foto }}" style="height:50px;width:50px;text-align:center"></td>
                <td>{{ $event->deskripsi}}</td>
                <td>{{ $event->lang}}</td>
                <td>{{ $event->long}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('event.show',$event->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('event.edit',$event->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['event.destroy', $event->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>
            
            {!! $events->links() !!}
    </section>
</div>

@include('dashboard.footer') 
</body>
</html>
