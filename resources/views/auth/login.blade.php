@extends('admin.layouts.main')

@section('content')
<div class="row mt-5 justify-content-center">
    @if(isset ($errors) && count($errors) > 0)
        <div class="alert alert-warning" role="alert">
            <ul class="list-unstyled mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-4">
        <form method="post" action="{{ route('login.perform') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-posta</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Şifre</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
</div>
  @endsection