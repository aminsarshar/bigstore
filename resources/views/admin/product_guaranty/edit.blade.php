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
                            <h4 class="card-title">ویرایش تنوع قیمت</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST"
                                action="{{ route('product.guaranties.update', [$product_guaranty->id , $product->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>قیمت اصلی</label>
                                                <input type="text" placeholder="قیمت اصلی" name="main_price"
                                                    value="{{ $product_guaranty->main_price }}" class="form-control" required
                                                    data-validation-required-message="فیلد قیمت اصلی الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>درصد تخفیف محصول</label>
                                                <input type="text" placeholder="درصد تخفیف محصول" name="discount"
                                                    value="{{ $product_guaranty->discount }}" class="form-control" required
                                                    data-validation-required-message="فیلد درصد تخفیف الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>تعداد محصول</label>
                                                <input type="text" placeholder="تعداد محصول" name="count"
                                                    value="{{ $product_guaranty->count }}" class="form-control" required
                                                    data-validation-required-message="فیلد تعداد محصول الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>تعداد مجاز فروش</label>
                                                <input type="text" placeholder="تعداد مجاز فروش" name="max_sell"
                                                    value="{{ $product_guaranty->max_sell }}" class="form-control" required
                                                    data-validation-required-message="فیلد تعداد مجاز فروش الزامی است">
                                            </div>
                                        </div>

                                        <input type="hidden" class="" name="product_id" value="{{$product->id}}">

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>رنگ محصول</label>
                                                <select name="color_id" class="form-control form-select">
                                                    <option disabled selected>رنگ محصول را انتخاب کنید</option>
                                                    @foreach ($colors as $key => $value)
                                                    @if ($product_guaranty->color_id == $key)
                                                    <option selected value="{{ $key }}"> {{ $value }} </option>
                                                    @else
                                                    <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endif
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
                                                    @if ($product_guaranty->guaranty_id == $key)
                                                    <option selected value="{{ $key }}"> {{ $value }} </option>
                                                    @else
                                                    <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endif
                                                        <option value="{{ $key }}"> {{ $value }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>فروش شگفت انگیز</label>
                                                <input type="text" placeholder="فروش شگفت انگیز" name="is_spacial"  id="special_start"
                                                    value="{{ verta($product_guaranty->special_start)->format('%d  %B   %Y') }}" class="form-control" required
                                                    data-validation-required-message="فیلد فروش شگفت انگیز الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label>تاریخ انقضا شگفت انگیز</label>
                                                <input type="text" placeholder=" تاریخ انقضا شگفت انگیز" name="special_expiration" id="special_expiration"
                                                    value="{{ verta($product_guaranty->special_expiration)->format('%d  %B   %Y') }}" class="form-control" required
                                                    data-validation-required-message="فیلد  تاریخ انقضا شگفت انگیز الزامی است">
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
