@extends('front.layouts.main')

@section('content')
<section class="row mt-5">
        <div class="col-12 col-md-6">
            <img src="{{ $product->firstImage->url ?? '/images/no-image.jpg' }}" class="card-img-top">
            <div class="row mt-3">
                @foreach($product->images as $image)
                    <div class="col-6 col-md-3"><img src="{{ asset($image->url) }}" class="img-fluid" /></div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h1>{{ $product->name }}</h1>
            <div class="my-4 fs-4">{{ $product->price }} ₺</div>
            <div class="d-flex align-items-center justify-content-start">
                <input type="number" class="form-control quantity me-4" data-product-id="{{ $product->id }}" value="1" min="1">
                <button type="button" class="btn btn-primary add-product-cart" data-product-id="{{ $product->id }}">Sepete Ekle</button>
            </div>
        </div>
</section>

<style>
    .quantity {
        width: 60px;
    }
</style>
@endsection