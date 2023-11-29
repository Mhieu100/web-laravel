<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container mt-1 mb-1">
        <a class="navbar-brand me-4" href="{{ url('/home') }}">
            <img src="{{ asset('assets/img/logo.png') }}" height="30" loading="lazy" style="margin-top: -1px;" />
        </a>
        <form class="d-flex input-group w-auto" action="{{ url('search') }}" method="Get" value="{{ Request::get('search') }}" role="search">
            <div class="input-group">
                <div class="form-outline">
                    <input id="search-input"  name="search" type="search" id="form1" class="form-control" />
                    <label class="form-label" for="form1">Tìm kiếm</label>
                </div>
                <button id="search-button" type="submit" class="btn btn-danger">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <ul class="navbar-nav navbar-collapse justify-content-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ url('/home') }}">Trang Chủ</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link fw-bold dropdown-toggle" href="" id="navbarDropdown">
                        Danh Mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item" href="{{ url('/collections/' . $category->name) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ url('/shop') }}">Cửa Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ url('/contact') }}">Liên Hệ</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link fw-bold" href="#">Blog Công Nghệ</a>
                </li> --}}
            </ul>
            <div class="d-flex align-items-center">
                <a class="link-secondary me-3 position-relative" href="{{ url('cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger"><livewire:frontend.cart.cart-count /></span>
                </a>
                <a class="link-secondary me-3" href="{{ url('wishlist') }}">
                    <i class="fas fa-heart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger"><livewire:frontend.wishlist-count /></span>
                </a>
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-danger me-2" href="{{ route('login') }}">Đăng Nhập</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-primary" href="{{ route('register') }}"> Đăng Kí </a>
                    @endif
                @else
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center link-secondary" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-user-alt"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="/profile"><i class="fa-solid fa-pen-to-square"></i> My
                                    Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/orders"><i class="fa-solid fa-list-ol"></i> My
                                    Orders</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Log Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
