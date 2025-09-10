@extends('admin.layouts.master')
@section('title')
محصولات های حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.products.trashed-products/>
            </div>
        </div>
    </section>
@endsection
