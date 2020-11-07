<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left:0px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <a href="/" class="brand-link">
    <img src="{{ asset('cpadmin/dist/img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Union VD</span>
    </a>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url()->previous() }}" class="nav-link">Previous</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('logout') }}" class=" nav-link text-danger"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>