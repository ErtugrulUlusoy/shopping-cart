@extends('front.layouts.main')

@section('content')
<section class="row mt-5">
    @foreach ($products as $product)
        <div class="col-3 mb-4">
            <div class="card">
                <a href="{{ url('product/' . $product->id) }}">
                 <img src="{{ $product->firstImage->url ?? '/images/no-image.jpg' }}" class="card-img-top">
                </a>
                <div class="card-body">
                <a href="{{ url('product/' . $product->id) }}" class="card-title text-dark text-decoration-none">{{ $product->name }}</a>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-dark">{{ $product->price }}</div>
                    <button type="button" class="btn btn-primary add-product-cart" data-product-id="{{ $product->id }}">Sepete Ekle</button>
                </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection