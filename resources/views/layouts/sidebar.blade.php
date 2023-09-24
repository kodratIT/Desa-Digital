 <!--APP-SIDEBAR-->
 <div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            {{-- <a class="header-brand1" href="index.html">
                <img src="../assets/images/brand/logo-white.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="../assets/images/brand/icon-white.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="../assets/images/brand/icon-dark.png" class="header-brand-img light-logo" alt="logo">
                <img src="../assets/images/brand/logo-dark.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a> --}}
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3></h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">Dashboard</span></a>
                </li>
                
                <li class="sub-category">
                    <h3>Feature</h3>
                </li>
                
                @can('pengajuan.index')
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('manage.pengajuan.index')}}"><i
                        class="side-menu__icon fe fe-file-text"></i><span
                            class="side-menu__label">Pengajuan Surat</span></a>
                </li>
                @endcan
                @can('laporan.index')
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('manage.laporan.index')}}"><i
                            class="side-menu__icon fe fe-info"></i><span
                            class="side-menu__label">Laporan Warga</span></a>
                </li>
                @endcan
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('webgis') }}"><i
                            class="side-menu__icon fe fe-map-pin"></i><span
                            class="side-menu__label">WebGIS PBB</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#commingsoon"><i
                            class="side-menu__icon fe fe-shield"></i><span
                            class="side-menu__label">Mitigasi Bencana</span></a>
                </li>
                @role(['admin','super-admin'])
                <li class="sub-category">
                    <h3>Administrator</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-database"></i><span
                        class="side-menu__label">Data Master</span><i
                        class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">apps</a></li>
                                            @can('jenis.surat')
                                            <li><a href="{{ route('manage.jenis-surat.index') }}" class="slide-item">Jenis Surat</a></li>
                                            @endcan
                                            @can('data.warga')
                                            <li><a href="{{ route('manage.data.warga') }}" class="slide-item">Data Warga</a></li>
                                            @endcan
                                            @can('data.kk')
                                            <li><a href="{{ route('manage.kartukeluarga.index') }}" class="slide-item">Data KK</a></li>
                                            @endcan
                                            @can('data.desa')
                                            <li><a href="{{ route('manage.data-desa.index') }}" class="slide-item">Data Desa</a></li>
                                            @endcan
                                            @can('data.rt')
                                            <li><a href="{{ route('manage.data-rt.index') }}" class="slide-item">Data RT</a></li>
                                            @endcan
                                            @can('data.rw')
                                            <li><a href="{{ route('manage.data-rw.index') }}" class="slide-item">Data RW</a></li>
                                            @endcan
                                            @can('data.master')
                                            <li><a href="{{route('admin.users.index')}}" class="slide-item">User</a></li>
                                            @endcan
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @endrole
                
                {{-- <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">Profile RT</span></a>
                </li> --}}

                
                @can('data.master')

                
                {{-- <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#"><i
                        class="side-menu__icon fe fe-database"></i><span
                        class="side-menu__label">Data Master</span><i
                        class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">apps</a></li>
                                            <li><a href="{{route('admin.users.index')}}" class="slide-item">User</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li> --}}
                @endcan

                @can('manage.access')
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-lock"></i><span
                            class="side-menu__label">User Access</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">apps</a></li>
                                            <li><a href="{{route('admin.roles.index') }}" class="slide-item"> Roles</a></li>
                                            <li><a href="{{route('admin.permissions.index') }}" class="slide-item"> Permissions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>More Tools</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-settings"></i><span
                            class="side-menu__label">Setting</span><i
                            class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">apps</a></li>
                                            <li><a href="cards.html" class="slide-item"> Company Profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @endcan
               
              
            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->