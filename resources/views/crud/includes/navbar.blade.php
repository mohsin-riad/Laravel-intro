<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="/" class="navbar-brand">Dashboard</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="{{ URL::to('employees') }}" class="nav-item nav-link">Employee List</a>
            <a href="{{ URL::to('insert') }}" class="nav-item nav-link">Registration</a>
            @yield('left-navbar')
        </div>
        <div class="navbar-nav ml-auto">
            @yield('right-navbar')
        </div>
    </div>
</nav> 