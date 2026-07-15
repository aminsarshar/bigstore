@extends('admin.layouts.master')

@section('title','ویرایش دسته بندی')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>ویرایش دسته بندی</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('post-categories.update',$postCategory) }}" method="POST">

            @csrf

            @method('PUT')

            @include('admin.post-categories.form')

            <button class="btn btn-primary mt-3">

                بروزرسانی

            </button>

        </form>

    </div>

</div>

@endsection
