@extends('admin.layouts.master')
@section('title')
ایجاد رنگ
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت رنگ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('colors.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">نام رنگ</label>
                                            <input type="text" placeholder="نام رنگ" name="name" class="form-control" required data-validation-required-message="فیلد نام رنگ الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 mb-2 sample-selector colorpicker-element">
                                            <div class="controls d-flex">
                                            <label class="sr-only" for="projectinput2">کد رنگ</label>
                                            <input type="text" placeholder="کد رنگ" name="code_color" class="form-control" required data-validation-required-message="فیلد نام رنگ الزامی است">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i style="background-color:rgb(255,0,0);"></i></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{route('colors.index')}}"><i class="icon-trash"></i> لغو</a>
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
