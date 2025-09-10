<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست گارانتی ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی گارانتی" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($guaranties))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام گارانتی</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guaranties as $index => $guaranty)
                            <tr>
                                <td>{{ $guaranties->firstItem() + $index }}</td>
                                <td class="text-truncate">
                                    <span>{{ $guaranty->name }}</span>
                                </td>
                                <td>
                                    {{ verta($guaranty->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('guaranties.edit', $guaranty->id) }}" style="guaranty: #fcac00" class="p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteGuaranty({{$guaranty->id}})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">گارانتیی وجود ندارد</div>
            @endif
            {{ $guaranties->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')

    <script>
        window.addEventListener('deleteGuaranty',event=>{
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonguaranty: '#3085d6',
                cancelButtonguaranty: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText:'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyGuaranty',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
