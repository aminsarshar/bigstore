<div class="card">
    <div class="card-header" >
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست محصولات</h4>
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
                    <a href="{{route('products.trashed')}}" class="btn btn-warning">بازگردانی محصولات</a>
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
                            <th>تنوع قیمت</th>
                            <th>ویژگی محصولات</th>
                            <th>گالری تصویر</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    {{-- <style>
                        .avatar-1 {
                            display: inline-block;
                            position: relative;
                            width: 65px;
                            white-space: nowrap;
                            border-radius: 1000px;
                            vertical-align: bottom;
                        }

                        .avatar-1 img {
                            width: 100%;
                            max-width: 100%;
                            height: auto;
                            border: 0;
                            border-radius: 1000px;
                        }
                    </style> --}}
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

                                <td>
                                    <a class="btn btn-outline-success" href="{{route('product.guaranties.index' , $product->id)}}">تنوع قیمت</a>
                                </td>

                                <td>
                                    <a class="btn btn-outline-success" href="{{route('product.properties.create', $product)}}">ویژگی محصولات</a>
                                </td>

                                <td>
                                    <a class="btn btn-outline-success" href="{{route('product.imagegallery.create' , $product->id)}}">گالری تصویر</a>
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('products.edit', $product->id) }}" style="color: #fcac00"
                                        class="p-0" class="p-0" data-original-title="" data-toggle="tooltip"
                                        data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteProduct({{ $product->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
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
        window.addEventListener('deleteProduct', event => {
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
                    Livewire.emit('destroyProduct', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
