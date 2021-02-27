<!DOCTYPE html>
<html lang="en">
<head>
@include('crud.includes.head')
</head>
<body>  
    @include('crud.includes.navbar')
    @yield('login')
    @yield('table')
    @yield('insert') 
    @yield('edit') 
</body>
</html>
