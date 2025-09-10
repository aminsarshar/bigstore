<div class="card">
    <div class="card-header" >
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست تنوع قیمت محصول</h4>
            </div>

            <div>
                <div class="left-items d-flex" style="margin-left: 55px;">
                    <div class="input-group w-75">
                        <input type="text" class="form-control" placeholder="جستجوی قیمت محصول" aria-label="Amount" wire:model="search">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="ft-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="w-25 ml-0 mr-2">
                        <a href="{{route('product.guaranties.create' , $product_id)}}" class="btn btn-success">ایجاد تنوع قیمت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">

                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>قیمت اصلی</th>
                            <th>تخفیف محصول</th>
                            <th>قیمت با تخفیف</th>
                            <th>گارانتی محصول</th>
                            <th>تعداد محصول</th>
                            <th>نهایت فروش</th>
                            <th>رنگ محصول</th>
                            <th>فروش ویژه</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ProductGuaranties as $index => $product_guaranties)
                            <tr>
                                <td>{{ $ProductGuaranties->firstItem() + $index }}</td>
                                <td class="text-truncate">
                                    <span>{{ $product_guaranties->main_price }}</span>
                                </td>

                                <td>
                                    @if (!empty($product_guaranties->discount))
                                        {{ $product_guaranties->discount }}
                                    @else
                                        <div class="badge badge-warning">تخفیفی ثبت نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <span>{{ $product_guaranties->price }}</span>
                                </td>

                                <td>
                                    <span class="badge badge-danger">{{ $product_guaranties->guaranty->name}}</span>
                                </td>

                                <td>
                                    <span class="badge badge-primary">{{ $product_guaranties->count}}</span>
                                </td>

                                <td>
                                    <span class="badge badge-primary">{{ $product_guaranties->max_sell}}</span>
                                </td>


                                <td>
                                    <span class="badge badge-info">{{ $product_guaranties->color->name}}</span>
                                </td>

                                <td>
                                    @if($product_guaranties->special_start == null && $product_guaranties->special_expiration == null)
                                    <span class="badge badge-secondary ">محصول عادی</span>
                                    @else
                                    <span class="badge badge-success text-white">محصول شگفت انگیز</span>
                                    @endif
                                </td>

                                <td>
                                    {{ verta($product_guaranties->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('product.guaranties.edit', [$product_guaranties->id , $product_id]) }}" style="color: #fcac00" class="p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>

                                    <a class="p-0 text-danger" wire:click="deleteProductGuaranty({{ $product_guaranties->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $ProductGuaranties->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('deleteProductGuaranty', event => {
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyProductGuaranty', event.detail.product_guaranty_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
