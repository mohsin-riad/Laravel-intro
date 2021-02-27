@extends('auth.layout.main')
@section('left-navbar')
<a href="{{ URL::to('employees') }}" class="nav-item nav-link">Employee List</a>
<a href="{{ URL::to('insert') }}" class="nav-item nav-link">Registration</a>
<a href="{{ URL::to('adminhome') }}" class="nav-item nav-link">Profile</a>
@stop
@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong>>> {{ Session::get('userrole')}}</strong></a>
@stop
@section('content')
    @if(Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> {{ Session::get('msg')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-angry-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.053 4.276a.5.5 0 0 1 .67-.223l2 1a.5.5 0 0 1 .166.76c.071.206.111.44.111.687C7 7.328 6.552 8 6 8s-1-.672-1-1.5c0-.408.109-.778.285-1.049l-1.009-.504a.5.5 0 0 1-.223-.67zm.232 8.157a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 1 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5 0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5z"/>
        </svg>
    </div>
    @endif
    <div class="container text-center" style="margin-top:80px">
        <section id="hero">
            <div class="hero-container" data-aos="fade-in">
            <h1>Welcome to Admin Panel</h1>
            <img src="{{ asset('auth/assets/img/hero-img.png') }}" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
        </section>
    </div>
@stop