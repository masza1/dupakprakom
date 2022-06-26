<div class="sidebar sidebar-light sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full">
            <i class="fa fa-briefcase"></i> DUPAK
        </div>
        <div class="sidebar-brand-narrow">
            <i class="fa fa-briefcase"></i>
        </div>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link {{  request()->routeIs(auth()->user()->level.'.dashboard') ? 'active' : ''  }}" href="{{ route(auth()->user()->level.'.dashboard') }}">
                <div class="nav-icon">
                    <i class="fa fa-tachometer-alt"></i>
                </div> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{  request()->routeIs('sekretariat.users.index') ? 'active' : ''  }}" href="{{ route('sekretariat.users.index') }}">
                <div class="nav-icon">
                    <i class="fa fa-users"></i>
                </div> Penilai
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{  request()->routeIs('sekretariat.users.index') ? 'active' : ''  }}" href="{{ route('sekretariat.users.index') }}">
                <div class="nav-icon">
                    <i class="fa fa-calendar"></i>
                </div> Periode DUPAK
            </a>
        </li>
        <li class="nav-title">Menu</li>
            @if (auth()->user()->level == 'sekretariat')
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle" href="#">
                        <div class="nav-icon">
                            <i class="fa fa-sticky-note"></i>
                        </div> Master
                    </a>
                    <ul class="nav-group-items">
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="{{ route('sekretariat.position.index') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-id-card"></i>
                                </span> Jabatan
                            </a>
                        </li>
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="{{ route('sekretariat.unsur.index') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-list-alt"></i>
                                </span> Unsur
                            </a>
                        </li>
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="{{ route('sekretariat.sub-unsur.index') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-list-alt"></i>
                                </span> Sub Unsur
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif (auth()->user()->level == 'penilai')
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle" href="#">
                        <div class="nav-icon">
                            <i class="fa fa-sticky-note"></i>
                        </div> DUPAK
                    </a>
                    <ul class="nav-group-items">
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="#">
                                <span class="nav-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </span>Buat Pengajuan
                            </a>
                        </li>
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="#">
                                <span class="nav-icon">
                                    <i class="fa fa-list-alt"></i>
                                </span>
                                Riyawat Pengajuan
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif (auth()->user()->level == 'prakom')
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle" href="#">
                        <div class="nav-icon">
                            <i class="fa fa-sticky-note"></i>
                        </div> DUPAK
                    </a>
                    <ul class="nav-group-items">
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="#">
                                <span class="nav-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </span>Buat Pengajuan
                            </a>
                        </li>
                        <li class="nav-item" style="padding-left: 10px">
                            <a class="nav-link" href="#">
                                <span class="nav-icon">
                                    <i class="fa fa-list-alt"></i>
                                </span>
                                Riyawat Pengajuan
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
