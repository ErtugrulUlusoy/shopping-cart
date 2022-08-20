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
            <div class="cart-container">
              <table class="table cart-table {{ (empty($cart->products) ? 'd-none' : '') }}">
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
                  @if(!empty($cart->products))
                  @foreach($cart->products as $product)
                  <tr data-id="{{ $product['productId'] }}">
                    <td>{{ $product['productName'] }}</td>
                    <td><input type="number" class="form-control cart-quantity" data-product-id="{{ $product['productId'] }}" style="max-width: 70px" value="{{ $product['quantity'] }}" min="1" /></td>
                    <td>{{ $product['price'] }} TL</td>
                    <td>{{ $product['amount'] }}</td>
                    <td><button type="button" class="btn btn-danger remove-product-cart" data-product-id="{{ $product['productId'] }}">Kaldır</button></td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
              <div class="text-end cart-total-holder {{ (empty($cart->products) ? 'd-none' : '') }}">
                <b>Toplam Tutar: <span class="cart-total">{{ $cart->total }}</span> ₺</b>
              </div>
            @if(empty($cart->products))
            <div class="text-center none-product-message">Sepetinizde hiç ürün yok</div>
            @endif
          </div>
          </ul>
        </div>

      </div>
    </div>
  </nav>