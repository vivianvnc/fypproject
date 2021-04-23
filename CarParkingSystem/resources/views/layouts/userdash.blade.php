@extends('layouts.default')

@section('content')
    @include('layouts.usersidebar')
        <div id="layoutSidenav_content"> 
        @include('includes.alerts')
            <div class="container-fluid">
            @yield('main-content')
            </div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Car Park Reservation System 2021 </div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </div>
@endsection