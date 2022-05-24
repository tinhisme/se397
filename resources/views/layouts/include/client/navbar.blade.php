<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">2T-Shop</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse " id="navbarColor01" style="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/category') }}">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">About</a>
                </li>
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>