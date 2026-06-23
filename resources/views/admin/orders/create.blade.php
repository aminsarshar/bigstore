@extends('admin.layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">ثبت سفارش جدید</h4>
    </div>

    <div class="card-body" style="padding: 25px">

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>نام مشتری</label>
                        <input type="text"
                               name="customer_name"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>شماره تماس</label>
                        <input type="text"
                               name="customer_phone"
                               class="form-control">
                    </div>
                </div>

            </div>

            <hr>

            <div class="d-flex justify-content-between mb-3">
                <h5>محصولات سفارش</h5>

                <button type="button"
                        class="btn btn-success add-row">
                    <i class="fa fa-plus"></i>
                    افزودن محصول
                </button>
            </div>

            <div id="products-wrapper">

                <div class="row product-row mb-3">

                    <div class="col-md-6">

                        <select name="products[0][id]" class="form-control">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">
                                    {{ $product->title }}
                                    - {{ number_format($product->price) }} تومان
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <input type="number"
                               name="products[0][quantity]"
                               class="form-control"
                               value="1"
                               min="1">

                    </div>

                    <div class="col-md-3">

                        <button type="button"
                                class="btn btn-danger remove-row">
                            حذف
                        </button>

                    </div>

                </div>

            </div>

            <hr>

            <button class="btn btn-primary btn-lg">
                ثبت سفارش
            </button>

        </form>

    </div>
</div>

@endsection

@section('script')

<script>

$(document).ready(function () {

    let i = 1;

    $(document).on('click', '.add-row', function () {

        let html = `
            <div class="row product-row mb-3">

                <div class="col-md-6">
                    <select name="products[${i}][id]" class="form-control">

                        @foreach($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->title }} - {{ number_format($product->price) }} تومان
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-3">
                    <input type="number"
                           name="products[${i}][quantity]"
                           class="form-control"
                           value="1"
                           min="1">
                </div>

                <div class="col-md-3">
                    <button type="button"
                            class="btn btn-danger remove-row">
                        حذف
                    </button>
                </div>

            </div>
        `;

        $('#products-wrapper').append(html);

        i++;

    });


    $(document).on('click', '.remove-row', function () {

        if ($('.product-row').length > 1) {
            $(this).closest('.product-row').remove();
        }

    });

});

</script>

@endsection
