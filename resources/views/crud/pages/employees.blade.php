@extends('crud.layout.main') 

@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong>>> {{ Session::get('userrole')}}</strong></a>
@stop
@section('left-navbar')
    <a href="{{ URL::to('adminhome') }}" class="nav-item nav-link">Profile</a>
@stop
@section('table')
    @if(Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> {{ Session::get('msg')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container" style="margin-top:80px">
        <h2>Employee List</h2>
        <table class="table">
            <thead class="thead-dark">
                <th>SL No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Role</th>
                <th>Status</th>
                <th>Password</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody {{ $i=1 }}>
                @foreach($employees as $e)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $e->name }}</td>
                        <td>{{ $e->email }}</td>
                        <td>{{ $e->gender }}</td>
                        <td>{{ $e->date_of_birth }}</td>
                        <td>{{ $e->role }}</td>
                            @if ($e->is_active == '1') <td class="text-success">Active</td>
                            @else  <td class="text-warning">Inactive</td>
                            @endif
                        <td>{{ $e->password }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ URL::to('edit/'.$e->id) }}">edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $e->id }}" href="#">delete</a>
                            <div id="myModal{{ $e->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>are you sure want  to delete <b>{{ $e->name }}</b>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="{{ URL::to('delete/'.$e->id) }}">Delete</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
@stop