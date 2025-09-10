@extends('admin.layouts.master')
@section('title')
    ویرایش برچسب
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش برچسب</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('tags.update', $tags->id) }}">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام برچسب</label>
                                                <input type="text" placeholder="نام برچسب" name="name"
                                                    value="{{ $tags->name }}" class="form-control" required
                                                    data-validation-required-message="فیلد نام برچسب الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                        <div class="controls">
                                            <label class="sr-only" for="projectinput2">نام برچسب</label>
                                            <input type="text" placeholder="نام برچسب" name="link"
                                                value="{{ $tags->link }}" class="form-control">
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ route('tags.index') }}" class="btn btn-danger mr-1">
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
