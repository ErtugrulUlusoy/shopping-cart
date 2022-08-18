@extends('admin.layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-end mb-3">
<h1 class="mt-5 mb-0">Yeni Ekle</h1>
</div>
<div class="row">
    <div class="col-12">
        <form action="#" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Ürün Adı</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Ürün Fiyatı</label>
              <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label class="form-label">Ürün Görselleri</label>
                <input class="form-control" type="file" name="images[]">
              </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </form>
    </div>
</div>
@endsection