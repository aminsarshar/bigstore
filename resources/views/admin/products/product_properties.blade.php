@extends('admin.layouts.master')
@section('title')
    ایجاد ویژگی محصول
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویژگی محصول : {{ $product->title }}</h4>
                        </div>
                    </div>

                    <livewire:admin.products.product-properties :product="$product" />

                </div>
            </div>

        </div>

    </section>
@endsection
