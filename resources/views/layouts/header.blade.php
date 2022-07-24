<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="header-nav me-4">
            <li class="nav-item dropdown d-flex align-items-center">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{-- <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="{{ auth()->user()->email }}"></div> --}}
                    {{ auth()->user()->email }}
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">{{ auth()->user()->email }}</div>
                    </div>
                    <a class="dropdown-item" href="javascript:;" data-coreui-toggle="offcanvas" data-coreui-target="#canvasEditProfile" aria-controls="offcanvasRight">
                        <i class="fa fa-user mr-2"></i> Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
