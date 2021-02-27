@extends('crud.layout.main') 
@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong>>> {{ Session::get('userrole')}}</strong></a>
@stop
@section('left-navbar')
    <a href="{{ URL::to('adminhome') }}" class="nav-item nav-link">Profile</a>
@stop
@section('edit') 
    @if(Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> {{ Session::get('msg')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container" style="margin-top:80px">
        <div class="card col-md-7">
            <h5 class="card-header text-center">Update Employee</h5>
            <form method="post" action="{{ URL::to('update/'.$employee->id) }}">
                <div class = "card-body">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for=""> Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value ="{{$employee->name }}" name="name" id="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Email</label>
                        <div class="col-sm-10">
                            <input type="email"class="form-control" value ="{{$employee->email }}" name="email" id="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="" value="male" {{ ($employee->gender == 'male')? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="" value="female" {{ ($employee->gender == 'female')? 'checked' : ''}}>
                                <label class="form-check-label" for="">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="" {{ ($employee->is_active == '1')? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="0" id="" {{ ($employee->is_active == '0')? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Date of Birth</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" value ="{{$employee->date_of_birth }}" name="date_of_birth" id="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Role</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="role">
                            <option>choose a role</option>
                            <option {{ ($employee->role == 'admin')? 'selected' : '' }} value="admin">admin</option>
                            <option {{ ($employee->role == 'manager')? 'selected' : '' }} value="manager">manager</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" value ="{{$employee->password }}" name="password" id="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" name="submit" class="btn btn-warning" value="Update Now">
                </div>  
            </form>
        </div><br><br>
    </div>    
@stop