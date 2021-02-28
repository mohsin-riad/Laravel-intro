@extends('crud.layout.main') 
@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong>>> {{ Session::get('userrole')}}</strong></a>
@stop
@section('left-navbar')
    <a href="{{ URL::to('adminhome') }}" class="nav-item nav-link">Profile</a>
@stop
@section('insert') 
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
            <h5 class="card-header text-center">Create Employee</h5>
            <form method="post" action="{{ URL::to('store-employee') }}">
                <div class = "card-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <!-- <label for=""> Name</label> -->
                        <input type="text" class="form-control"  name="name" placeholder="Name" id="">
                        @if($errors->has('name')) 
                            <div class="alert alert-warning">
                            {{ $errors->first('name')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- <label for="">Email</label> -->
                        <input type="email"class="form-control"  name="email" id="" placeholder="Email">
                        @if($errors->has('email'))
                            <div class="alert alert-warningwarning
                                {{ $errors->first('email')}}
                            </div>
                        @endif
                    </div>
                
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="" value="male">
                            <label class="form-check-label" for="">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id=""  value="female">
                            <label class="form-check-label" for="">
                                Female
                            </label>
                        </div>
                        @if($errors->has('gender'))
                            <div class="alert alert-warning">
                                {{ $errors->first('gender')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="" >
                            <label class="form-check-label" for="">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="0" id="" disabled>
                            <label class="form-check-label" for="">
                                Inactive
                            </label>
                        </div>
                        @if($errors->has('is_active'))
                            <div class="alert alert-warning">
                                {{ $errors->first('is_active')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Date of Birth</label> -->
                        <input type="date" class="form-control"  name="date_of_birth" id="" placeholder="Date of birth">
                        @if($errors->has('date_of_birth'))
                            <div class="alert alert-warning">
                                {{ $errors->first('date_of_birth')}}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control"  name="role">
                        <option selected>choose a role</option>
                        <option value="admin">admin</option>
                        <option value="manager">manager</option>
                        </select>
                        @if($errors->has('role'))
                            <div class="alert alert-warning">
                                {{ $errors->first('role')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Password</label> -->
                        <input type="password" class="form-control"  name="password" id="" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="alert alert-warning">
                                {{ $errors->first('password')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" name="submit" class="btn btn-primary" value="Create">
                </div>  
            </form>
        </div><br><br>
    </div>    
@stop