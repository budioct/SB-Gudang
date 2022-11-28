<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">

                <li class="active"><a class="{{ request()->is('dashboard') ? 'active' : '' }} item" href="/dashboard"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

                @if(auth()->user()->role == 1)
                <li class="active"><a class="{{ request()->is('user') ? 'active' : '' }} item" href="/user" ><i class="lnr lnr-user"></i> <span>User</span></a></li>
                @endif
                <li class="active"><a class="{{ request()->is('kategori') ? 'active' : '' }} item" href="/kategori" ><i class="lnr lnr-layers"></i> <span>Kategori</span></a></li>

                <li class="active"><a class="{{ request()->is('barang') ? 'active' : '' }} item" href="/barang" ><i class="lnr lnr-briefcase"></i> <span>Barang</span></a></li>

            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
