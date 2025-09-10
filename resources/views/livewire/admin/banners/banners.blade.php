<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست بنر ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی بنر" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($banners))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عکس بنر</th>
                            <th>عنوان بنر</th>
                            <th>متن بنر</th>
                            <th>نوع بنر</th>
                            <th>لینک بنر</th>
                            <th>متن دکمه بنر</th>
                            <th>آیکون دکمه بنر</th>
                            <th>وضعیت بنر</th>
                            <th>تاریخ ایجاد</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <style>
                        .avatar-1 {
                            display: inline-block;
                            position: relative;
                            width: 165px;
                            white-space: nowrap;
                            border-radius: 1000px;
                            vertical-align: bottom;
                        }

                        .avatar-1 img {
                            width: 100%;
                            max-width: 100%;
                            height: auto;
                            border: 0;
                            border-radius: 500px;
                        }
                    </style>
                    <tbody>
                        @foreach ($banners as $index => $banner)
                            <tr>
                                <td>{{ $banners->firstItem() + $index }}</td>
                                <td>
                                    @if (!empty($banner->image))
                                        <span class="avatar-1">
                                            <img class="box-shadow-2"
                                                src="{{ url('admin/images/banners/' . $banner->image) }}" alt="avatar">
                                        </span>
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->title))
                                        {{ $banner->title }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->text))
                                        {{ $banner->text }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->type))
                                    <div class="badge badge-success text-white">{{ $banner->type }}</div>
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->button_link))
                                        {{ $banner->button_link }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->button_text))
                                        {{ $banner->button_text}}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($banner->button_icon))
                                        {{ $banner->button_icon}}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td wire:click="ChangeBannerStatus({{ $banner->id }})" style="cursor: pointer">
                                    @if ($banner->status == 'active')
                                        <div class="badge badge-success text-white">فعال</div>
                                    @elseif($banner->status == 'inactive')
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @elseif($banner->status == 'banned')
                                        <div class="badge badge-warning">مسدود شده</div>
                                    @endif
                                </td>


                                <td>
                                    {{ verta($banner->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td style="display: flex;justify-content:center">
                                    <a href="{{ route('banners.edit', $banner->id) }}" style="color: #fcac00" class="p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                        <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                    </a>
                                    <a class="p-0 text-danger" wire:click="deleteBanner({{$banner->id}})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">بنری وجود ندارد</div>
            @endif
            {{ $banners->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@section('script')

    <script>
        window.addEventListener('deleteBanner',event=>{
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
                    Livewire.emit('destroyBanner',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
