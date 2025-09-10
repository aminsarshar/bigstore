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
                    <a href="{{ route('categories.trashed') }}" class="btn btn-warning">بازگردانی دسته بندی ها</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($categories))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر دسته بندی</th>
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

                                <td>
                                    @if (!empty($category->image))
                                        <span class="avatar-1">
                                            <img class="box-shadow-2"
                                                src="{{ url('admin/images/categories/' . $category->image) }}" alt="avatar">
                                        </span>
                                    @else
                                    <span class="avatar-1">
                                        <img class="box-shadow-2"
                                            src="{{ url('admin/images/categories/no-image.png') }}" alt="avatar">
                                    </span>
                                    @endif
                                </td>

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
                                    <a href="{{ route('categories.edit', $category->id) }}" style="color: #fcac00"
                                        class="p-0" data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteCategory({{ $category->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="ویرایش">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>


                                    {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf

                                    @method('delete')
                                    <button style="background: none;border:none" type="submit" class="danger p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف"> <i class="fa fa-trash-o font-medium-3 mr-2"></i></button>
                                </form> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">دسته بندی وجود ندارد</div>
            @endif
            {{ $categories->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('deleteCategory', event => {
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
                    Livewire.emit('destroyCategory', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
    <style>
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
    </style>
@endsection
