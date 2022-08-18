@extends('admin.layouts.main')

@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-4">
        <form>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-posta</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
</div>
  @endsection