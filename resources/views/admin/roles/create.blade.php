@extends('admin.layouts.master')
@section('title')
ایجاد نقش
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت نقش</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('roles.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">عنوان نقش</label>
                                            <input type="text" name="name" class="form-control" placeholder="عنوان نقش را وارد کنید" required data-validation-required-message="فیلد عنوان نقش الزامی است">
                                            </div>
                                        </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{route('roles.index')}}"><i class="icon-trash"></i> لغو</a>
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
