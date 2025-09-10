@extends('admin.layouts.master')
@section('title')
    ویرایش ویژگی
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش گروه ویژگی ها</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('property_groups.update', $property_group->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>نام ویژگی</label>
                                                <input type="text" placeholder="نام ویژگی" name="title"
                                                    value="{{ $property_group->title }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام ویژگی الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="form-label">دسته بندی</label>
                                                <select name="category_id" class="form-control form-select">
                                                    @foreach ($categories as $key => $value)
                                                        @if ($property_group->category_id == $key)
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
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{ route('property_groups.index') }}" class="btn btn-danger mr-1">
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
