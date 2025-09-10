@extends('admin.layouts.master')
@section('title')
    رنگ ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.colors.colors/>
            </div>
        </div>
    </section>
@endsection
