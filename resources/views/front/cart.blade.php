@extends('front.layouts.main')
@section('content')

<section class="row mt-5">
  <div class="col-12">
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
              <td><input type="number" class="form-control cart-quantity" data-product-id="{{ $product['productId'] }}" style="max-width: 70px" value="{{ $product['quantity'] }}" /></td>
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
  </div>
</section>

@endsection