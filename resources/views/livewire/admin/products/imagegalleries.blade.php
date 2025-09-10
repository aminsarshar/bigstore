<div class="card">
    <div class="card-header" >
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست تصاویر محصول</h4>
            </div>

            {{-- <div class="left-items d-flex" style="margin-left: 55px;">
                <div class="input-group w-75">
                    <input type="text" class="form-control" placeholder="جستجوی محصول" aria-label="Amount" wire:model="search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="ft-search"></i>
                        </span>
                    </div>
                </div>
                <div class="w-25 ml-0 mr-2">
                    <a href="{{route('products.trashed')}}" class="btn btn-warning">بازگردانی تصاویر محصول</a>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عکس</th>
                            <th>موقعیت عکس</th>
                            <th>تاریخ ایجاد</th>
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
                        @foreach ($imagegalleries as $index => $imagegallery)
                            <tr>
                                <td>{{ $imagegalleries->firstItem() + $index }}</td>
                                <td>
                                    @if (!empty($imagegallery->image))
                                        <span class="avatar-1">
                                            <img class="box-shadow-1" width="100"
                                                src="{{ url('admin/images/ImageGalleries/' . $imagegallery->image) }}"
                                                alt="avatar">
                                        </span>
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <span>{{ $imagegallery->position }}</span>
                                </td>

                                <td>
                                    {{ verta($imagegallery->created_at)->format('%d  %B   %Y') }}
                                </td>


                                <td style="display: flex;justify-content:center">
                                    {{-- <a href="{{ route('products.edit', $imagegallery->id) }}" style="color: #fcac00"
                                        class="p-0" class="p-0" data-original-title="" data-toggle="tooltip"
                                        data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a> --}}
                                    <a class="p-0 text-danger" wire:click="deleteImageGallery({{ $imagegallery->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            {{ $imagegalleries->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('deleteImageGallery', event => {
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
                    Livewire.emit('destroyImageGallery', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
