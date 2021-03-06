@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="card-header">Providers Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('providers.create')}}"> Create New User</a>
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
      <th>Identifiant</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Company</th>
      <th>Roles</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
     <tr>
       <td>{{ ++$i }}</td>
       <td>{{ $user->id }}</td>
       <td>{{ $user->name }}</td>
       <td>{{ $user->email }}</td>
       <td>{{ $user->phone }}</td>
       <td>{{ $user->company }}</td>
       <td>
         @if(!empty($user->getRoleNames()))
           @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
           @endforeach
         @endif
       </td>
       <td>
          <a class="btn btn-info" href="{{ route('providers.show',$user->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('providers.edit',$user->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['providers.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
       </td>
     </tr>
    @endforeach
   </table>
   
   {!! $data->render() !!}
   
   <p class="text-center text-primary"><small>Entreprise : SUNUKOOM</small></p>
   @endsection