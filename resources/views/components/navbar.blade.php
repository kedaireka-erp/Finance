<nav class="navbar navbar-expand-lg mt-4">
    <div class=" d-flex container-fluid">
      <i class="material-icons-round bi me-4" id="burger-menu-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">menu</i>    
      <i class="material-icons-round bi me-4" id="burger-menu">menu</i>    
      <div>
        <div class="dropdown px-4">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" style="color:#5C5858;" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="52" height="52" class="rounded-circle me-2">
            <div class="d-flex flex-column">
              <strong>{{ Auth::user()->name }}</strong>
              <span>Admin</span>
            </div>
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
          </ul>
        </div>
      </div>    
    </div>
  </nav>
