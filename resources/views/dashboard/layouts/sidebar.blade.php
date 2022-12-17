<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{route('dashboard.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            @can('member')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/my-loan*') ? 'active' : '' }}" aria-current="page" href="{{route('my-loan.index')}}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    My Loan
                </a>
            </li>
            @endcan
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                <span>Administrator</span>
            </h6>

{{--            <ul class="nav flex-column">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link {{ Request::is('dashboard/collections') ? 'active' : '' }}" href="{{route('collections.index')}}">--}}
{{--                        <span data-feather="grid"></span>--}}
{{--                        Collection List--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('loans*') ? 'active' : '' }}" href="{{route('loans.index')}}">
                        <i class="bi bi-book-half"></i>
                        Manajemen Koleksi
                    </a>
                </li>
            </ul>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('subjects*') ? 'active' : '' }}" href="{{route('subjects.index')}}">
                        <i class="bi bi-grid"></i>
                        Daftar Subjek
                    </a>
                </li>
            </ul>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('collection-type*') ? 'active' : '' }}" href="{{route('collection-type.index')}}">
                        <i class="bi bi-box-fill"></i>
                        Tipe Koleksi
                    </a>
                </li>
            </ul>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{route('users.index')}}">
                        <i class="bi bi-people-fill"></i>
                        Daftar Pengguna
                    </a>
                </li>
            </ul>

        @endcan
    </div>
</nav>
