@extends('layouts.default')
@section('content')
<main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              @yield('form-content')
        </div>
      </div>
    </div>
</main>
@endsection
