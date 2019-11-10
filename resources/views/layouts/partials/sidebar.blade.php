    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" id="nav">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{url('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-home"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user') }}"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li><a href="{{ route('klasis') }}"><i class="fa fa-circle-o"></i> Data Klasis</a></li>
            <li><a href="{{ route('gereja') }}"><i class="fa fa-circle-o"></i> Data Gereja</a></li>
            <li><a href="{{ route('sektor') }}"><i class="fa fa-circle-o"></i> Data Sektor</a></li>
            <li><a href="{{ route('unit') }}"><i class="fa fa-circle-o"></i> Data Unit</a></li>
            <li><a href="{{ route('wadah') }}"><i class="fa fa-circle-o"></i> Data Wadah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Data Umat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('keluarga')}}"><i class="fa fa-circle-o"></i> Data Keluarga</a></li>
            <li><a href="{{ route('anggota-jemaat') }}"><i class="fa fa-circle-o"></i> Data Anggota Jemaat</a></li>
          </ul>
        </li>

        <li>
          <a href="{{ route('berita') }}">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
          </a>
        </li>
                <li>
          <a href="{{ route('warta') }}">
            <i class="fa fa-newspaper-o"></i>
            <span>Warta</span>
          </a>
        </li>
        <li>
          <a href="{{ route('kegiatan') }}">
            <i class="fa fa-calendar"></i>
            <span>Kegiatan</span>
          </a>
        </li>
          <li>
          <a href="{{ route('gallery') }}">
            <i class="fa fa-image"></i>
            <span>Gallery</span>
          </a>
        </li>
         <li>
          <a href="{{ route('jadwal-ibadah') }}">
            <i class="fa fa-calendar"></i>
            <span>Jadwal Ibadah</span>
          </a>
        </li>
        <li>
          <a href="{{ route('laporan') }}">
            <i class="fa fa-users"></i>
            <span>Laporan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->