<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="public/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin SI Bioskop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/profil') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('bioskop') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bioskop</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('genre') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Genre</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('kategori') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('kursi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kursi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('notifikasi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notifikasi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('film') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>
                Film
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('jadwal') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('tiket') }}" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tiket
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('transaksi') }}" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('user_pengguna') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User Pengguna
              </p>
            </a>
          </li>
          @if(auth()->user()->level=="Superadmin")
          <li class="nav-item">
            <a href="{{ url('user') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User Karyawan
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a onclick="event.preventDefault(); document.getElementById('logout').submit()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
              <form action="{{ url('/logout') }}" method="POST" id="logout" class="display: none;">
            @csrf
              </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>