<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست برچسب ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی برچسب" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($tags))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام برچسب</th>
                            <th>لینک برچسب</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $index => $tag)
                            <tr>
                                <td>{{ $tags->firstItem() + $index }}</td>
                                <td class="text-truncate">
                                    <span>{{ $tag->name }}</span>
                                </td>
                                <td>
                                    @if (!empty($tag->link))
                                        {{ $tag->link }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    {{ verta($tag->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('tags.edit', $tag->id) }}" style="color:#fcac00" class="p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteTag({{$tag->id}})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">برچسبی وجود ندارد</div>
            @endif
            {{ $tags->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')

    <script>
        window.addEventListener('deleteTag',event=>{
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtontag: '#3085d6',
                cancelButtontag: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText:'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyTag',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
