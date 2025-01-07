<div>
    <nav class="mt-2">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <ul class="nav nav-pills nav-sidebar flex-column w-100" style="overflow-x: hidden!important;"
                    data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Beranda
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            @if ($users->divisi_id == 2 || $users->divisi_id == 26 || $users->login_level == 'pj')
                                @switch($typing)
                                    @case('A')
                                        @foreach ($dept as $d)
                                            <li class="nav-item">
                                                <a href="{{ route('laporan', $d->divisi_nama) }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{ $d->divisi_nama }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @break

                                    @case('B')
                                        <li class="nav-item">
                                            <a href="{{ route('laporan', [$dd->divisi_nama]) }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ $dd->divisi_nama }}</p>
                                            </a>
                                        </li>
                                    @break
                                @endswitch
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('laporan', [$dd->divisi_nama]) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $dd->divisi_nama }}</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    @if ($users->divisi->id == 2 || $users->divisi_id == 26)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Divisi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @foreach ($dept as $d)
                                    <li class="nav-item">
                                        <a href="{{ route('index-divisi', $d->divisi_nama) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $d->divisi_nama }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tugas
                            </p>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Pengaduan
                            </p>
                        </a>
                    </li> --}}

                </ul>
            </div>
        </div>
    </nav>
</div>
