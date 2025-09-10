<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست کاربران</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی کاربر" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($users))
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عکس کاربر</th>
                        <th>نام کاربر</th>
                        <th>ایمیل</th>
                        <th>شماره همراه</th>
                        <th>وضعیت</th>
                        <th>نقش های کاربر</th>
                        <th>تاریخ عضویت</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
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
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            @if ($user->image == !null)
                                <td>
                                    <span class="avatar-1">
                                        <img class="box-shadow-2" src="{{ url('admin/images/users/' . $user->image) }}"
                                            alt="avatar">
                                    </span>
                                </td>
                            @else
                                <td>
                                    <span class="avatar-1">
                                        <img class="box-shadow-2" src="{{ url('admin/images/users/default.svg') }}"
                                            alt="avatar">
                                    </span>
                                </td>
                            @endif
                            <td class="text-truncate">
                                <span>{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->mobile))
                                    {{ $user->mobile }}
                                @else
                                    <div class="badge badge-warning">این فیلد وارد نشده</div>
                                @endif
                            </td>

                            <td wire:click="ChangeUserStatus({{$user->id}})" style="cursor: pointer" title="تغییر وضعیت کاربر">
                                @if ($user->status == 'active')
                                    <div class="badge badge-success text-white">فعال</div>
                                @elseif($user->status == 'inactive')
                                    <div class="badge badge-danger">غیر فعال</div>
                                @elseif($user->status == 'banned')
                                    <div class="badge badge-warning">مسدود شده</div>
                                @endif
                            </td>

                            <td>
                                <a href="{{route('user.create.role' , $user->id)}}" class="btn btn-outline-warning">نقش های کاربر</a>
                            </td>

                            <td>
                                {{ verta($user->created_at)->format('%d  %B   %Y') }}
                            </td>

                            <td style="display: flex;justify-content:center">
                                <a href="{{ route('users.edit', $user->id) }}" style="color: #fcac00" class="p-0"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a class="p-0 text-danger" wire:click="deleteUser({{$user->id}})"
                                data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-warning">کاربری وجود ندارد</div>
            @endif
            {{ $users->appends(Request::except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
</div>

@section('script')

    <script>
        window.addEventListener('deleteUser',event=>{
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
                    Livewire.emit('destroyUser',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
