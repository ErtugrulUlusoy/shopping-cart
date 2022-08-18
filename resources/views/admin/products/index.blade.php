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
                <th scope="col">#</th>
                <th scope="col">Görsel</th>
                <th scope="col">Adı</th>
                <th scope="col">Fiyat</th>
                <th scope="col">İşlem</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td><a href="{{ url('admin/products/edit/1') }}" class="btn btn-primary">Düzenle</a></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection