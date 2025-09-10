<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست نقش ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی نقش" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($roles))
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان نقش</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $roles->firstItem() + $index }}</td>
                            <td class="text-truncate">
                                <span>{{ $role->name }}</span>
                            </td>

                            <td style="display: flex;justify-content:center">
                                <a href="{{ route('roles.edit', $role->id) }}" style="color: #fcac00" class="p-0"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a class="p-0 text-danger" wire:click="deleteRole({{$role->id}})"
                                data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">نقشی وجود ندارد</div>
            @endif
            {{ $roles->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')

    <script>
        window.addEventListener('deleteRole',event=>{
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText:'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyRole',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
