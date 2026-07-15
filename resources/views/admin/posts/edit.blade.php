```blade
@extends('admin.layouts.master')

@section('title','ویرایش مقاله')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">ویرایش مقاله</h4>
            </div>

            <div class="card-content">

                <div class="card-body">

                    <form action="{{ route('posts.update',$post) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- ستون اصلی --}}
                            <div class="col-md-8">

                                <div class="form-group">

                                    <label>عنوان مقاله</label>

                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title',$post->title) }}">

                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <label>اسلاگ</label>

                                    <input
                                        type="text"
                                        name="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        value="{{ old('slug',$post->slug) }}">

                                    @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <label>دسته بندی</label>

                                    <select
                                        name="post_category_id"
                                        class="form-control @error('post_category_id') is-invalid @enderror">

                                        <option value="">
                                            انتخاب دسته بندی
                                        </option>

                                        @foreach($categories as $category)

                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('post_category_id',$post->post_category_id)==$category->id ? 'selected' : '' }}>

                                                {{ $category->title }}

                                            </option>

                                        @endforeach

                                    </select>

                                    @error('post_category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="form-group">

                                    <label>خلاصه مقاله</label>

                                    <textarea
                                        rows="4"
                                        name="excerpt"
                                        class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt',$post->excerpt) }}</textarea>

                                    @error('excerpt')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="form-group">

                                    <label>متن مقاله</label>

                                    <textarea
                                        id="editor"
                                        name="body">{{ old('body',$post->body) }}</textarea>

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
                                        value="{{ old('seo_title',$post->seo_title) }}"
                                        class="form-control">

                                </div>

                                <div class="form-group">

                                    <label>توضیحات سئو</label>

                                    <textarea
                                        rows="4"
                                        name="seo_description"
                                        class="form-control">{{ old('seo_description',$post->seo_description) }}</textarea>

                                </div>

                            </div>

                            {{-- ستون کناری --}}
                            <div class="col-md-4">

                                @if($post->image)

                                    <div class="mb-3">

                                        <img
                                            src="{{ asset('admin/images/posts/'.$post->image) }}"
                                            class="img-fluid rounded">

                                    </div>

                                @endif

                                <div class="form-group">

                                    <label>تصویر شاخص</label>

                                    <input
                                        type="file"
                                        class="dropify"
                                        name="image"
                                        data-default-file="{{ $post->image ? asset('admin/images/posts/'.$post->image) : '' }}">

                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <label>وضعیت انتشار</label>

                                    <select
                                        class="form-control"
                                        name="status">

                                        <option
                                            value="1"
                                            {{ old('status',$post->status)==1 ? 'selected' : '' }}>

                                            منتشر شود

                                        </option>

                                        <option
                                            value="0"
                                            {{ old('status',$post->status)==0 ? 'selected' : '' }}>

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
                                            {{ old('is_featured',$post->is_featured) ? 'checked' : '' }}>

                                        مقاله ویژه

                                    </label>

                                </div>

                                <hr>

                                <button
                                    class="btn btn-success btn-block">

                                    بروزرسانی مقاله

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
