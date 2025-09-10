@extends('admin.layouts.master')
@section('title')
ایجاد کاربر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش کاربر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('users.update' , $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <i class="icon-user"></i> اطلاعات شخصی
                                    </h4>
                                    <div class="row">
                                            <div class="form-group col-md-6 mb-2">
                                                <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام کاربری</label>
                                                <input type="text" placeholder="نام کاربری" name="name" value="{{$user->name}}" class="form-control" required data-validation-required-message="فیلد نام کاربری الزامی است">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <div class="controls">
                                                <label class="sr-only" for="projectinput2">ایمیل</label>
                                                <input type="text" placeholder="ایمیل" name="email" value="{{$user->email}}" class="form-control" required data-validation-required-message="فیلد ایمیل الزامی است">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <div class="form-group">
                                                <label class="sr-only" for="projectinput2">شماره موبایل</label>
                                                <input type="text" placeholder="شماره موبایل" name="mobile" value="{{$user->mobile}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <div class="form-group">
                                                <label class="sr-only" for="projectinput2">لینک اینستاگرام</label>
                                                <input type="text" placeholder="لینک اینستاگرام" name="instagram" value="{{$user->instagram}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                            <div class="old-image" style="border: 1px solid red">
                                                <img width="100" src="{{url('admin/images/users/'.$user->image)}}" alt="">
                                            </div>
                                        </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">عکس</label>
                                                <input name="image" type="file" class="form-control" id="basicInput">
                                            </fieldset>
                                        </div>


                                    </div>
                                    {{-- <h4 class="form-section">
                                        <i class="icon-book-open"></i>مورد نیاز پروژه
                                    </h4>

                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only" for="projectinput5">شرکت</label>
                                            <input type="text" id="projectinput5" class="form-control"
                                                placeholder="نام شرکت" name="company">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput6">علاقه مند هستم</label>
                                            <select id="projectinput6" name="interested" class="form-control">
                                                <option value="none" selected="" disabled="">علاقه مند هستم</option>
                                                <option value="design">طرح</option>
                                                <option value="development">توسعه</option>
                                                <option value="illustration">تصویر</option>
                                                <option value="branding">نام تجاری</option>
                                                <option value="video">ویدئو</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput7">بودجه</label>
                                            <select id="projectinput7" name="budget" class="form-control">
                                                <option value="0" selected="" disabled="">بودجه</option>
                                                <option value="less than 5000$">کمتر از 5000 ریال</option>
                                                <option value="5000$ - 10000$">5000 ریال 10000 - ریال</option>
                                                <option value="10000$ - 20000$">10000 ریال 20000 - ریال</option>
                                                <option value="more than 20000$">بیش از 20000 ریال </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only">انتخاب فایل</label>
                                            <label id="projectinput8" class="file center-block">
                                                <input type="file" id="file">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only" for="projectinput9">
                                                خلاصه پروژه</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="خلاصه پروژه"></textarea>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <i class="icon-trash"></i> لغو
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
