@extends('product.layout.main')
@section('left-navbar')
    <a href="#" class="nav-item nav-link">Products</a>
@stop
@section('right-navbar')
    <a href="{{ URL::to('logout') }}" class="nav-item nav-link">Log Out</a>
    <a href="#" class="nav-item btn btn-warning"><strong>>> {{ Session::get('userrole')}}<strong></a>
@stop
@section('style')
    <style>
        table{ font-weight:normal; }
    </style>
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
    <div class="container" style="margin-top:40px">
        <h2>All Products</h2>
        <table class="table table-bordered" id="abc">
            <thead class="thead-dark" >
                <th class="text-center">Product</th>
                <th class="text-center">Price</th>
                <th class="text-center">Category</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </thead>
            <tbody class="text-center">
                @if($products)
                    @foreach($products as $p)
                        <tr>
                            <td>{{ $p->product }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->category }}</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready( function () {
            $('#abc').DataTable({
                "aoColumnDefs": [{
                    "bSortable": false, 
                    "aTargets": [ 3,4 ] //Disable sort on multiple column
                }],

                dom: 'Bfrtip',
                buttons: [
                    'pageLength', //button to show 10-20-50 rows
                    //Exclude column from export
                    {
                        extend: 'copyHtml5',
                        exportOptions: { columns: [ 0, 1, 2 ] }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: { columns: [ 0, 1, 2 ] }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: { columns: [ 0, 1, 2 ] }
                    },
                    {    
                        extend: 'pdfHtml5',
                        exportOptions: { columns: [ 0, 1, 2 ] }
                    }
                ],
                
                lengthMenu: [ //Page length
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ]
            });
        });
    </script>
@stop