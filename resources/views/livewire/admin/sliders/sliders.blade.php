<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست اسلایدر ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی اسلایدر" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عکس اسلایدر</th>
                            <th>لینک اسلایدر</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $index => $slider)
                            <tr>
                                <td>{{ $sliders->firstItem() + $index }}</td>
                                <td>
                                    @if (!empty($slider->image))
                                    <span class="avatar-1">
                                        <img class="box-shadow-1"
                                            style="width: 29%;height: 100%;border-radius: 8px;padding: 2px;"
                                            src="{{ url('admin/images/sliders/' . $slider->image) }}"
                                            alt="avatar">
                                    </span>
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($slider->url))
                                        {{ $slider->url }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    {{ verta($slider->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('sliders.edit', $slider->id) }}" style="color: #fcac00" class="p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteSlider({{$slider->id}})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $sliders->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')

    <script>
        window.addEventListener('deleteSlider',event=>{
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
                    Livewire.emit('destroySlider',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
