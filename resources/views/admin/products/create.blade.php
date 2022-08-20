@extends('admin.layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-end mb-3">
<h1 class="mt-5 mb-0">Yeni Ekle</h1>
</div>
<div class="row">
    <div class="col-12">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <form method="POST" action="{{ url('admin/products/create') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="mb-3">
              <label class="form-label">Ürün Adı</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Ürün Fiyatı</label>
              <input type="text" class="form-control" name="price" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Ürün Görselleri</label>
                <input class="form-control" type="file" name="images[]" multiple>
              </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </form>
    </div>
</div>
@endsection