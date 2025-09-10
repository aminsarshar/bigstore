@extends('admin.layouts.master')
@section('title')
    محصولات
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.product-guaranties.product-guaranties :product_id="$product_id"/>
            </div>
        </div>
    </section>
@endsection

