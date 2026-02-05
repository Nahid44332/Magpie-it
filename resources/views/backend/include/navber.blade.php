 <nav class="navbar-top">
    <h5>Dashboard Analytics</h5>
    <div class="d-flex align-items-center gap-3">
      <button id="langSwitch" class="btn btn-sm btn-outline-light">EN</button>
      <div class="user-menu">
        <div class="user-trigger d-flex align-items-center gap-2">
          <img src="{{asset('backend/assets/img/Screenshot_5.png')}}" alt="Profile">
          <span>Mr. John <i class="bi bi-caret-down-fill"></i></span>
        </div>
        <div class="dropdown-menu-custom">
          <a href="#"><i class="bi bi-person me-2"></i>Profile Settings</a>
          <a href="#"><i class="bi bi-gear me-2"></i>Settings</a>
          <a href="{{url('/admin/logout')}}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
        </div>
      </div>
    </div>
  </nav>