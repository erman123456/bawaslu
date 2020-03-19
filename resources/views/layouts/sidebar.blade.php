<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{asset('images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{asset('images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">Nik Patel</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                
                <li>
                    <a href="{{route('dashboard.index')}}">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">MENU UTAMA</li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="briefcase"></i>
                        <span> Master Data</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="email-inbox.html">Satuan</a></li>
                        <li><a href="email-inbox.html">Jenis</a></li>
                        <li><a href="email-inbox.html">Merek</a></li>
                        <li><a href="email-inbox.html">Gudang</a></li>
                        <li><a href="email-inbox.html">Pemasok</a></li>
                        <li><a href="email-inbox.html">Daftar Item</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="archive"></i>
                        <span> Persediaan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="email-inbox.html">Saldo Awal Item</a></li>
                        <li><a href="email-inbox.html">Stok Opname</a></li>
                        <li><a href="email-inbox.html">Daftar Item Masuk</a></li>
                        <li><a href="email-inbox.html">Daftar Item Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="shopping-cart"></i>
                        <span> Pembelian</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="email-inbox.html">Pesanan Pembelian / PO</a></li>
                        <li><a href="email-inbox.html">Pembelian</a></li>
                        <li><a href="email-inbox.html">Retur Pembelian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="shopping-bag"></i>
                        <span> Penjualan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="email-inbox.html">Pesanan Penjualan / SO</a></li>
                        <li><a href="email-inbox.html">Penjualan</a></li>
                        <li><a href="email-inbox.html">Retur Penjualan</a></li>
                    </ul>
                </li>
                <li class="menu-title">FASILITAS</li>
                <li>
                    <a href="#">
                        <i data-feather="grid"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Barcode </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
