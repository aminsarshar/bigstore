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
                            <h4 class="card-title">ساخت بنر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('banners.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="custom-file">
                                                <div class="controls">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        name="image">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب
                                                        فایل</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">عنوان بنر</label>
                                                <input type="text" placeholder="عنوان بنر" name="title"
                                                    class="form-control"
                                          >
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن بنر</label>
                                                <input type="text" placeholder="متن بنر" name="text"
                                                    class="form-control"
                                        >
                                            </div>
                                        </div>

                                        {{-- <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">وضعیت بنر</label>
                                                <input type="text" placeholder="نام بنر" name="name"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام بنر الزامی است">
                                            </div>
                                        </div> --}}

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نوع بنر</label>
                                                <select name="type" class="form-control form-select">
                                                    <option value="" selected>نوع بنر را انتخاب کنید</option>
                                                    <option value="{{'top_banner'}}">بنر بالا</option>
                                                    <option value="{{'side_banner'}}">بنر کناری</option>
                                                    <option value="{{'large_banner'}}">بنر بزرگ</option>
                                                    <option value="{{'medium_banner'}}">بنر متوسط</option>
                                                    <option value="{{'small_banner'}}">بنر کوچک</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن دکمه</label>
                                                <input type="text" placeholder="متن دکمه" name="button_text"
                                                    class="form-control"
                                             >
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">لینک دکمه</label>
                                                <input type="text" placeholder="متن دکمه" name="button_text"
                                                    class="form-control"
                                              >
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">آیکون دکمه</label>
                                                <input type="text" placeholder="آیکون دکمه" name="button_icon"
                                                    class="form-control"
                                               >
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">

                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('banners.index') }}"><i class="icon-trash"></i>
                                            لغو</a>
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
