<div class="card">
    <div class="card-header" >
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست محصولات حذف شده</h4>
            </div>

            <div class="left-items d-flex" style="margin-left: 55px;">
                <div class="input-group w-75">
                    <input type="text" class="form-control" placeholder="جستجوی محصول" aria-label="Amount" wire:model="search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="ft-search"></i>
                        </span>
                    </div>
                </div>
                <div class="w-25 ml-0 mr-2">
                    <a href="{{route('products.index')}}" class="btn btn-warning">لیست محصولات</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($products))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عکس محصول</th>
                            <th>نام محصول</th>
                            <th>دسته بندی محصول</th>
                            <th>برند محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $index }}</td>
                                <td>
                                    @if (!empty($product->image))
                                        <span class="avatar-1">
                                            <img class="box-shadow-1"
                                                style="width: 29%;height: 100%;border-radius: 8px;padding: 12px;"
                                                src="{{ url('admin/images/products/' . $product->image) }}"
                                                alt="avatar">
                                        </span>
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <span>{{ $product->title }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{ $product->category->name }}</span>
                                </td>

                                <td>
                                    <span class="badge badge-warning text-white">{{ $product->brand->name }}</span>
                                </td>




                                <td>
                                    {{ verta($product->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">

                                    <a wire:click="restoreProduct({{ $product->id }})"
                                        class="btn btn-success">بازگردانی</a>
                                    <a class="btn btn-danger mr-2" wire:click="forceDeleteProduct({{ $product->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف کامل">
                                        حذف
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">محصولاتی وجود ندارد</div>
            @endif
            {{ $products->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('forceDeleteProduct', event => {
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
                    Livewire.emit('forceDestroyProduct', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
