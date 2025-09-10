@extends('admin.layouts.master')
@section('title')
    ایجاد اسلایدر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت اسلایدر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('sliders.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-4">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">لینک اسلایدر</label>
                                                <input type="text" placeholder="نام اسلایدر" name="url"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام اسلایدر الزامی است">
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
                                        <a class="text-white" href="{{ route('sliders.index') }}"><i
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
