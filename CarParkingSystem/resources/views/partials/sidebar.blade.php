@extends('layouts.userdash')

@section('userdash')
<div class="wrapper">
  <!-- Sidebar -->
  <nav id="sidebar">
      <div class="sidebar-header">
          <h3>Bootstrap Sidebar</h3>
      </div>

      <ul class="sidebar-nav">
          <p>User Dashboard</p>
          <li>
              <a href="#">About</a>
          </li>
          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
          </li>
          <li>
              <a href="#">Edit Profile</a>
          </li>
          <li>
              <a href="#">View Reservation</a>
          </li>
          <li>
            <a href="#">Logout</a>
        </li>
      </ul>
  </nav>

@endsection