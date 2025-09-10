@extends('admin.layouts.master')
@section('title')
    ایجاد محصول
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت محصول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('products.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام محصول</label>
                                                <input type="text" placeholder="نام محصول" name="title"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام محصول الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام انگلیسی محصول</label>
                                                <input type="text" placeholder="نام انگلیسی محصول" name="etitle"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام انگلیسی محصول الزامی است">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>دسته بندی</label>
                                                <select name="category_id" class="form-control form-select">
                                                    <option disabled selected>دسته بندی را انتخاب کنید</option>
                                                    @foreach ($categories as $key => $value)
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>برند</label>
                                                <select name="brand_id" class="form-control form-select">
                                                    <option disabled selected>برند را انتخاب کنید</option>
                                                    @foreach ($brands as $key => $value)
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>برچسب</label>
                                                <select name="tags[]" class="form-control form-select" multiple>
                                                    @foreach ($tags as $key => $value)
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="form-label">توضیحات محصول</label>
                                            <div class="controls">
                                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl" name="description" cols="80"
                                                    rows="30" value="{{ old('description') }}"
                                                    ></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                                <div class="controls">
                                                    {{-- <label for="projectinput2">تصویر</label> --}}
                                                    <input name="image" type="file" class="dropify" multiple />
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('products.index') }}"><i
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
