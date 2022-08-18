<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">Dashboard</a>
          <a class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}" href="{{ url('/admin/products') }}">Ürünler</a>
        </div>
        <div class="">
          <a class="nav-link" href="{{ url('auth/logout') }}">Çıkış Yap</a>
        </div>
      </div>
    </div>
  </nav>