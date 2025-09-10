@extends('admin.layouts.master')
@section('title')
    ایجاد تنوع قیمت محصول
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت تنوع قیمت محصول {{ $product->title }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('product.guaranties.store', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">قیمت اصلی محصول</label>
                                                <input type="number" placeholder="قیمت اصلی محصول" name="main_price"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد قیمت اصلی محصول الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">درصد تخفیف محصول</label>
                                                <input type="number" placeholder="درصد تخفیف محصول" name="discount"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد درصد تخفیف محصول الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">تعداد محصول</label>
                                                <input type="number" placeholder="تعداد محصول" name="count"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد تعداد محصول الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">تعداد مجاز فروش</label>
                                                <input type="number" placeholder="تعداد مجاز فروش" name="max_sell"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد تعداد مجاز فروش الزامی است">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>رنگ محصول</label>
                                                <select name="color_id" class="form-control form-select">
                                                    <option disabled selected>رنگ محصول را انتخاب کنید</option>
                                                    @foreach ($colors as $key => $value)
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>گارانتی محصول</label>
                                                <select name="guaranty_id" class="form-control form-select">
                                                    <option disabled selected>گارانتی محصول را انتخاب کنید</option>
                                                    @foreach ($guaranties as $key => $value)
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label> تاریخ شروع فروش شگفت انگیز</label>
                                                <input type="text" id="special_start" class="text-left form-control" dir="rtl" name="special_start">
                                            </div>
                                        </div>


                                        <input type="hidden" class="" name="product_id" value="{{$product->id}}">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label> تاریخ انقضای فروش شگفت انگیز</label>
                                                <input type="text" id="special_expiration" class="text-left form-control" dir="rtl" name="special_expiration">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>


                        <div class="form-actions">
                            <button type="button" class="btn btn-danger mr-3">
                                <a class="text-white" href="{{ route('product.guaranties.index' , $product->id) }}"><i
                                        class="icon-trash"></i> لغو</a>
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

@section('script')
    <script>
        $('.form-select').select2();
    </script>

    <script>
        var customOptions = {
            placeholder: "روز / ماه / سال",
            twodigit: false,
            closeAfterSelect: true,
            nextButtonIcon: "fa fa-arrow-circle-right",
            previousButtonIcon: "fa fa-arrow-circle-left",
            buttonsColor: "#5867dd",
            markToday: true,
            markHolidays: true,
            highlightSelectedDay: true,
            sync: true,
            gotoToday: true
        }
        kamaDatepicker('special_expiration', customOptions);
        kamaDatepicker('special_start', customOptions);
    </script>
@endsection
