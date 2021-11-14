  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
            <span>
                {{ Auth::user()->username}}
            </span>
            <i class="caret"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li>
            <form class="form-inline text-center" action="{{  url('logout') }}" method="POST">
                @csrf
                <button class="icon-switch2 btn btn-block" type="submit">
                    Logout
                </button>
            </form>
        </li>
        </ul>
    </li>
    </ul> 
  </nav>
  <!-- /.navbar -->