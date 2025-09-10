@extends('admin.layouts.master')
@section('title')
    ایجاد گالری تصویر محصول
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت گالری تصویر محصول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('product.imagegallery.store', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label for="projectinput2">گالری تصویر</label>
                                                <input name="image" type="file" class="dropify" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit">ارسال</button>
                            </form>

                            <livewire:admin.products.imagegalleries :product="$product" />



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

    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'فایل را به اینجا بکشید یا کلیک کنید',
                'replace': 'برای جایگزینی فایل را به اینجا بکشید یا کلیک کنید',
                'remove': 'پاک کردن',
                'error': 'با پوزش فراوان، خطایی رخ داده'
            },
            error: {
                'fileSize': 'حجم فایل بیشتر از حد مجاز است (1M).'
            }
        });
    </script>
@endsection
