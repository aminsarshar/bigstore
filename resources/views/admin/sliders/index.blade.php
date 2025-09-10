@extends('admin.layouts.master')
@section('title')
     اسلایدر ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.sliders.sliders/>
            </div>
        </div>
    </section>
@endsection
