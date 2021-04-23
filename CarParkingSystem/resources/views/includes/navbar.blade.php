<!-- Navigation -->
<nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          Car Park Reservation System
        </a>
    <button class="navbar-toggler" id="sidebarToggle" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" href="#" >
          <span class="navbar-toggler-icon"></span>
        </button>

        @if (Auth::check())
          @if(Auth::user()->admin==TRUE)
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/admin">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            </ul>
          </div>
          @else
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/user">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            </ul>
          </div>
          @endif
        @else
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/userlogin">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/usersignup">Sign Up</a>
            </li>
          </ul>
        </div>
        @endif
  </div>
</nav>
<script>
  (function($) {
  "use strict";

  // Add active state to sidbar nav links
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
      $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
          if (this.href === path) {
              $(this).addClass("active");
          }
      });

  // Toggle the side navigation
  $(".navbar-toggle").on("click", function(e) {
      e.preventDefault();
      $("body").toggleClass("sb-sidenav-toggled");
  });
})(jQuery);

</script> 
