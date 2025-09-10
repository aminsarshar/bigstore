@extends('admin.layouts.master')
@section('title')
    ویرایش دسته بندی
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش دسته بندی</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام دسته بندی</label>
                                                <input type="text" placeholder="نام دسته بندی" name="name"
                                                    value="{{ $category->name }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام دسته بندی الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام انگلیسی دسته بندی</label>
                                                <input type="text" placeholder="نام انگلیسی دسته بندی" name="ename"
                                                    value="{{ $category->ename }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام انگلیسی الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label  class="form-label">دسته پدر</label>
                                                <select name="parent_id" class="form-control form-select">
                                                    <option selected value="0"> دسته اصلی </option>
                                                    @foreach($categories as $key => $value)
                                                        @if($category->parent_id == $key)
                                                            <option selected value="{{$key}}"> {{$value}} </option>
                                                        @else
                                                            <option value="{{$key}}"> {{$value}} </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{route('categories.index')}}" class="btn btn-danger mr-1">
                                        <i class="icon-trash"></i> بازگشت
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="icon-note"></i> ذخیره
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
@section('script')
    <script>
        $('.form-select').select2();
    </script>
@endsection
