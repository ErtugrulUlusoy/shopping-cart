<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Shopping Cart App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Anasayfa</a>
          <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ url('cart') }}">Sepet</a>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sepetim
          </button>
          <ul class="dropdown-menu p-3 dropdown-menu-end" style="width: 500px">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Ürün</th>
                  <th scope="col">Adet</th>
                  <th scope="col">Fiyat</th>
                  <th scope="col">Tutar</th>
                  <th scope="col">İşlem</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Test ürün</td>
                  <td><input type="number" class="form-control cart-quantity" style="max-width: 70px" /></td>
                  <td>10.00 TL</td>
                  <td>20.00 TL</td>
                  <td><button type="button" class="btn btn-danger">Kaldır</button></td>
                </tr>
                <tr>
                  <td>Test ürün</td>
                  <td><input type="number" class="form-control cart-quantity" style="max-width: 70px" /></td>
                  <td>10.00 TL</td>
                  <td>20.00 TL</td>
                  <td><button type="button" class="btn btn-danger">Kaldır</button></td>
                </tr>
              </tbody>
            </table>
          </ul>
        </div>

      </div>
    </div>
  </nav>