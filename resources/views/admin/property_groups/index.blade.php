@extends('admin.layouts.master')
@section('title')
    گروه ویژگی ها
@endsection
@section('content')
    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <livewire:admin.property-groups.property-groups/>
            </div>
        </div>
    </section>
@endsection
