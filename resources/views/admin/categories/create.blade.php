@extends('admin.layouts.master')
@section('title')
    ایجاد دسته بندی
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت دسته بندی</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('categories.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                            <div class="form-group col-md-6 mb-2">
                                                <div class="custom-file">
                                                <div class="controls">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام دسته بندی</label>
                                                <input type="text" placeholder="نام دسته بندی" name="name"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام دسته بندی الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام انگلیسی دسته بندی</label>
                                                <input type="text" placeholder="نام انگلیسی دسته بندی" name="ename"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام انگلیسی دسته بندی الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only">دسته والد</label>
                                                <select name="parent_id" class="form-control form-select">
                                                    <option selected value="0"> دسته اصلی </option>
                                                    @foreach($categories as $key => $value)
                                                        <option value="{{$key}}"> {{$value}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('categories.index') }}"><i
                                                class="icon-trash"></i> لغو</a>
                                    </button>
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
