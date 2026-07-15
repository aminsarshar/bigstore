```blade
@extends('admin.layouts.master')

@section('title','افزودن مقاله')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">افزودن مقاله جدید</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('posts.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- ستون اصلی --}}
                        <div class="col-lg-8">

                            <div class="form-group">

                                <label>عنوان مقاله <span class="text-danger">*</span></label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label>اسلاگ</label>

                                <input
                                    type="text"
                                    name="slug"
                                    value="{{ old('slug') }}"
                                    class="form-control @error('slug') is-invalid @enderror">

                                @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label>خلاصه مقاله</label>

                                <textarea
                                    rows="4"
                                    name="excerpt"
                                    class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>

                                @error('excerpt')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label>متن مقاله <span class="text-danger">*</span></label>

                                <textarea
                                    id="editor"
                                    name="body"
                                    class="@error('body') is-invalid @enderror">{{ old('body') }}</textarea>

                                @error('body')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <hr>

                            <h5 class="mb-3">
                                تنظیمات سئو
                            </h5>


                            <div class="form-group">

                                <label>عنوان سئو</label>

                                <input
                                    type="text"
                                    name="seo_title"
                                    value="{{ old('seo_title') }}"
                                    class="form-control">

                            </div>


                            <div class="form-group">

                                <label>توضیحات سئو</label>

                                <textarea
                                    rows="4"
                                    name="seo_description"
                                    class="form-control">{{ old('seo_description') }}</textarea>

                            </div>

                        </div>



                        {{-- ستون کناری --}}
                        <div class="col-lg-4">


                            <div class="form-group">

                                <label>دسته بندی</label>

                                <select
                                    name="post_category_id"
                                    class="form-control @error('post_category_id') is-invalid @enderror">

                                    <option value="">
                                        انتخاب کنید
                                    </option>

                                    @foreach($categories as $category)

                                        <option
                                            value="{{ $category->id }}"
                                            {{ old('post_category_id') == $category->id ? 'selected' : '' }}>

                                            {{ $category->title }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('post_category_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label>تصویر شاخص</label>

                                <input
                                    type="file"
                                    name="image"
                                    class="dropify">

                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">

                                <label>وضعیت انتشار</label>

                                <select
                                    name="status"
                                    class="form-control">

                                    <option
                                        value="1"
                                        {{ old('status',1)==1 ? 'selected':'' }}>

                                        منتشر شود

                                    </option>

                                    <option
                                        value="0"
                                        {{ old('status')==='0' ? 'selected':'' }}>

                                        پیش نویس

                                    </option>

                                </select>

                            </div>



                            <div class="form-group">

                                <label>

                                    <input
                                        type="checkbox"
                                        name="is_featured"
                                        value="1"
                                        {{ old('is_featured') ? 'checked' : '' }}>

                                    مقاله ویژه

                                </label>

                            </div>


                            <hr>

                            <button class="btn btn-success btn-block">

                                ثبت مقاله

                            </button>

                            <a
                                href="{{ route('posts.index') }}"
                                class="btn btn-secondary btn-block">

                                بازگشت

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

@section('script')

<script>

CKEDITOR.replace('editor',{

    height:500

});

</script>

@endsection
```
