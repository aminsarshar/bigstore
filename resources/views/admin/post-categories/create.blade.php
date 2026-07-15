@extends('admin.layouts.master')

@section('title','افزودن دسته بندی مقاله')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>افزودن دسته بندی</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('post-categories.store') }}" method="POST">

            @csrf

            @include('admin.post-categories.form')

            <button class="btn btn-success mt-3">

                ذخیره

            </button>

        </form>

    </div>

</div>

@endsection
