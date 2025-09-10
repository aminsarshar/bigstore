<div class="card">
    <div class="card-header">
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست دسته بندی ها</h4>
            </div>

            <div class="left-items d-flex" style="margin-left: 55px;">
                <div class="input-group w-75">
                    <input type="text" class="form-control" placeholder="جستجوی دسته بندی" aria-label="Amount"
                        wire:model="search">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="ft-search"></i>
                        </span>
                    </div>
                </div>
                <div class="w-25 ml-0 mr-2">
                    <a href="{{ route('categories.index') }}" class="btn btn-warning">برگشت به دسته بندی ها</a>
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
                        <th>عنوان دسته بندی</th>
                        <th>عنوان دسته بندی</th>
                        <th>دسته والد</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $index }}</td>
                            <td class="text-truncate">
                                <span>{{ $category->name }}</span>
                            </td>

                            <td class="text-truncate">
                                <span>{{ $category->ename }}</span>
                            </td>

                            <td class="text-truncate">
                                <span>{{ $category->Categoryparent->name }}</span>
                            </td>

                            <td style="display: flex;justify-content:center">

                                <a wire:click="restoreCategory({{ $category->id }})"
                                    class="btn btn-success">بازگردانی</a>
                                <a class="btn btn-danger mr-2" wire:click="forceDeleteCategory({{ $category->id }})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف کامل">
                                    حذف
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('forceDeleteCategory', event => {
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
                    Livewire.emit('forceDestroyCategory', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
