@extends('admin.layouts.master')
@section('title')
ایجاد برند
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش برند</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('brands.update' , $brands->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام برند</label>
                                                <input type="text" placeholder="نام برند" name="name" value="{{$brands->name}}" class="form-control" required data-validation-required-message="فیلد نام برند الزامی است">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <div class="controls">
                                                <label class="sr-only" for="projectinput2">لینک برند</label>
                                                <input type="text" placeholder="لینک برند" name="link" value="{{$brands->link}}" class="form-control">
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                            <div class="old-image" width="100">
                                                <img width="100" src="{{url('admin/images/brands/'.$brands->image)}}" alt="">
                                            </div>
                                        </fieldset>
                                        </div>

                                        <div class="form-group col-md-6 mb-3">

                                            <label for="inputGroupFile01" class="upload-box">
                                                <div class="upload-content">
                                                    <div class="upload-icon">📷</div>
                                                    <h5>عکس خود را آپلود کنید</h5>
                                                    <p>برای انتخاب تصویر کلیک کنید</p>
                                                    <small>فرمت‌های مجاز: JPG, PNG, WEBP</small>
                                                </div>

                                                <img id="imagePreview" src="" alt="" style="display:none;">
                                            </label>

                                            <input type="file" id="inputGroupFile01" name="image" accept="image/*"
                                                hidden>
                                        </div>


                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{route('brands.index')}}" class="btn btn-danger mr-1">
                                        <i class="icon-trash"></i> لغو
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
