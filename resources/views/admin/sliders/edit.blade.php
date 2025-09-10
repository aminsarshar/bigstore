@extends('admin.layouts.master')
@section('title')
    ویرایش اسلایدر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش اسلایدر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('sliders.update', $sliders->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">لینک اسلایدر</label>
                                                <input type="text" placeholder="لینک اسلایدر" name="url"
                                                    value="{{ $sliders->url }}" class="form-control" required
                                                    data-validation-required-message="فیلد لینک اسلایدر الزامی است">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                                {{-- <label for="projectinput2">تصویر</label> --}}
                                                <input name="image" type="file" class="dropify" multiple />
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                                            <fieldset class="form-group">
                                                <label for="projectinput2" style="font-size: 18px">عکس فعلی</label>
                                                <div class="old-image" style="display: flex;justify-content:center">
                                                    <img style="width: 100%" src="{{ url('admin/images/sliders/' . $sliders->image) }}"
                                                        alt="">
                                                </div>
                                            </fieldset>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ route('sliders.index') }}" class="btn btn-danger mr-1">
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
