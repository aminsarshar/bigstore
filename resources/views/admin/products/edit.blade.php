@extends('admin.layouts.master')
@section('title')
    ویرایش محصول
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش محصول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>نام محصول</label>
                                                <input type="text" placeholder="نام محصول" name="title"
                                                    value="{{ $product->title }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام محصول الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>نام انگلیسی محصول</label>
                                                <input type="text" placeholder="نام انگلیسی محصول" name="etitle"
                                                    value="{{ $product->etitle }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام انگلیسی الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="form-label">دسته بندی</label>
                                                <select name="category_id" class="form-control form-select">
                                                    @foreach ($categories as $key => $value)
                                                        @if ($product->category_id == $key)
                                                            <option selected value="{{ $key }}">
                                                                {{ $value }} </option>
                                                        @else
                                                            <option value="{{ $key }}"> {{ $value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="form-label">دسته بندی</label>
                                                <select name="brand_id" class="form-control form-select">
                                                    @foreach ($brands as $key => $value)
                                                        @if ($product->brand_id == $key)
                                                            <option selected value="{{ $key }}">
                                                                {{ $value }} </option>
                                                        @else
                                                            <option value="{{ $key }}"> {{ $value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>برچسب</label>
                                                <select name="tags[]" class="form-control form-select" multiple>
                                                    @foreach ($tags as $key => $value)
                                                        @if (in_array($key, $product->tags->pluck('id')->toArray()))
                                                            <option selected value="{{ $key }}">{{ $value }}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <label class="form-label">توضیحات محصول</label>
                                            <div class="controls">
                                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl" name="description" cols="30"
                                                    rows="10" value="{{ old('description') }}"
                                                >
                                                {{$product->description}}
                                                </textarea>
                                            </div>
                                        </div>

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
                                            <label class="form-label">عکس فعلی محصول</label>
                                            <div class="controls">
                                               <img src="{{url('admin/images/products/'.$product->image)}}" alt="">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-actions">
                                        <a href="{{ route('products.index') }}" class="btn btn-danger mr-1">
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
