@extends('admin.layouts.master')
@section('title')
    محصولات
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.products.products/>
            </div>
        </div>
    </section>
@endsection
