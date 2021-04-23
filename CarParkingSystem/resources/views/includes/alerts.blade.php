<script>
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0)
    .slideUp(500, function(){
        $(this).remove(); 
    });
    }, 3000);
</script>


@if(session('success'))
    <div class="alert alert-success container-fluid" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning container-fluid" role="alert">
        <strong>{{ session('warning') }}</strong>
  </div>
@endif

@if(session('main-error'))
        <div class="alert alert-danger container-fluid" role="alert">
            {{session('main-error')}}
        </div>
@endif
