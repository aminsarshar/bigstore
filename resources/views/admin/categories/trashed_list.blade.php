@extends('admin.layouts.master')
@section('title')
    دسته بندی های حذف شده
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.categories.trashed-category/>
            </div>
        </div>
    </section>
@endsection
