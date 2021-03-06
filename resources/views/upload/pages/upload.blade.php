@extends('auth.layout.main')
@section('left-navbar')
    <a href="{{ URL::to('products') }}" class="nav-item nav-link">Products</a>
    <a href="{{ URL::to('upload') }}" class="nav-item nav-link">Upload</a>
@stop
@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong> {{ Session::get('username')}} | {{ Session::get('userrole')}}</strong></a>
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
    <div class="container" style="margin-top:50px">
        
        <div class="row">
            <div class="card col-md-7">
                <h5 class="card-header text-center">Upload Images</h5>
                <form method="post" action="{{ URL::to('upload-image') }}" enctype="multipart/form-data">
                    <div class = "card-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" multiple name="filename[]" id="banners" class="form-control">
                        </div>
                        <div id="show" class="form-group">
                            <div id="msg"></div>
                            <label for="">showing selected images:</label>
                            <div class="img-thumbnail" id="showbanner"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload" name="" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card col-md-5">
                <h5 class="card-header text-center">Uploaded Images</h5>
                <div class = "card-body"> 
                    <div hidden>{{ $fg=false }}</div>
                    @foreach($img as $i)
                        <div hidden>{{ $fg=true }}</div>
                        <img src="{{ asset('thumbnail/'.$i->filename) }} " alt="" class="img-fluid" style="width: 180px; height: 180px; overflow: hidden;">
                    @endforeach
                    @if(!$fg)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Attention!</strong> NO FILES FOUND
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-angry-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.053 4.276a.5.5 0 0 1 .67-.223l2 1a.5.5 0 0 1 .166.76c.071.206.111.44.111.687C7 7.328 6.552 8 6 8s-1-.672-1-1.5c0-.408.109-.778.285-1.049l-1.009-.504a.5.5 0 0 1-.223-.67zm.232 8.157a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 1 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5 0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#show').hide();
            $('#banners').change(function() {
                $('#show').show();
                show_img(this, '#showbanner');
            });
            
            function show_img(input, preview) {
                if (input.files) {
                    for (i = 0; i < input.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img class="img-fluid" style="width: 180px; height: 180px; overflow: hidden;">')).attr('src', event.target.result).appendTo(preview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
        });
    </script>
@stop