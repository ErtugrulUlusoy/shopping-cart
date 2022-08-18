@extends('front.layouts.main')
@section('content')

<section class="row mt-5">
  <div class="col-12">
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
  </div>
</section>

@endsection