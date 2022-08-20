@extends('admin.layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-end mb-3">
<h1 class="mt-5 mb-0">Ürünler</h1>
<a href="{{ url('admin/products/create') }}"  class="btn btn-primary">Yeni Ekle</a>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Görsel</th>
                <th scope="col">Adı</th>
                <th scope="col">Fiyat</th>
                <th scope="col" class="text-center">İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td><img src="{{ $product->firstImage->url ?? '/images/no-image.jpg' }}" width="50" height="50" /></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td class="text-center">
                  <a href="{{ url('admin/products/delete/'. $product->id) }}" class="btn btn-danger">Sil</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection