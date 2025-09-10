@extends('admin.layouts.master')
@section('title')
ایجاد بنر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش بنر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('banners.update' , $banners->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                            <div class="old-image" width="100">
                                                <img width="100" src="{{url('admin/images/banners/'.$banners->image)}}" alt="">
                                            </div>
                                        </fieldset>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">عکس</label>
                                                <input name="image" type="file" class="form-control" id="basicInput">
                                            </fieldset>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">عنوان بنر</label>
                                            <input type="text" placeholder="عنوان بنر" name="title" value="{{$banners->title}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">متن بنر</label>
                                            <input type="text" placeholder="متن بنر" name="text" value="{{$banners->text}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">نوع بنر</label>
                                            <select name="type" class="form-control form-select" required data-validation-required-message="فیلد آیکون بنر الزامی است">
                                                <option @if($banners->type =='top_banner') selected @endif value="{{'top_banner'}}">بنر بالا</option>
                                                <option @if($banners->type =='side_banner') selected @endif value="{{'side_banner'}}">بنر کناری</option>
                                                <option @if($banners->type =='large_banner') selected @endif value="{{'large_banner'}}">بنر بزرگ</option>
                                                <option @if($banners->type =='medium_banner') selected @endif value="{{'medium_banner'}}">بنر متوسط</option>
                                                <option @if($banners->type =='small_banner') selected @endif value="{{'small_banner'}}">بنر کوچک</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">متن دکمه بنر</label>
                                            <input type="text" placeholder="متن دکمه بنر" name="button_text" value="{{$banners->button_text}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">لینک بنر</label>
                                            <input type="text" placeholder="لینک بنر" name="button_link" value="{{$banners->button_link}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">آیکون بنر</label>
                                            <input type="text" placeholder="آیکون بنر" name="button_icon" value="{{$banners->button_icon}}" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">



                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{route('banners.index')}}" class="btn btn-danger mr-1">
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
