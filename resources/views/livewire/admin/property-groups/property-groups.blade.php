<div class="card">
    <div class="card-header">
        <div class="items d-flex" style="justify-content:space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست ویژگی ها</h4>
            </div>

            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="جستجوی ویژگی" aria-label="Amount"
                    wire:model="search">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="ft-search"></i>
                    </span>
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
                        <th>عنوان گروه ویژگی</th>
                        <th>دسته بندی</th>
                        <th>تاریخ ایجاد</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property_groups as $index => $property_group)
                        <tr>
                            <td>{{ $property_groups->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                <span>{{ $property_group->title }}</span>
                            </td>
                            <td>
                                <span class="badge badge-primary">{{ $property_group->category->name }}</span>
                            </td>
                            <td>
                                {{ verta($property_group->created_at)->format('%d  %B   %Y') }}
                            </td>
                            <td style="display: flex;justify-content:center">
                                <a href="{{ route('property_groups.edit', $property_group->id) }}" style="color: #fcac00"
                                    class="p-0" class="p-0" data-original-title="" data-toggle="tooltip"
                                    data-placement="top" title="ویرایش">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a class="p-0 text-danger" wire:click="deletePropertyGroup({{ $property_group->id }})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $property_groups->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('deletePropertyGroup', event => {
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
                    Livewire.emit('destroyPropertyGroup', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>


<script>
    $('select').select2([
        dir: "rtl",
        dropdownAutoWidth: true,
        dropdownParent: $('#parent')
    ])
</script>
@endsection
