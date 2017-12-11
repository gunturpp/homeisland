@include('dashboard.header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">CRUD</li>
      </ol>
    </section>
 
    <section class="content">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Homeisland Userlist CRUD Application</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('cruds.create') }}"> Create New User</a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Handphone Number</th>
                    <th width="280px">Action</th>
                </tr>
            @foreach ($cruds as $crud)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $crud->name}}</td>
                <td>{{ $crud->email}}</td>
                <td>{{ $crud->password}}</td>
                <td>{{ $crud->handphone_number}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('cruds.show',$crud->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('cruds.edit',$crud->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['cruds.destroy', $crud->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>

            {!! $cruds->links() !!}
    </section>

</div>