<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست کامنت ها</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی کامنت" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            @if (isset($comments))
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th>متن کامنت</th>
                            <th>تاریخ ایجاد</th>
                            <th>تایید یا عدم تایید</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $index => $comment)
                            <tr>
                                <td>{{ $comments->firstItem() + $index }}</td>
                                <td class="text-truncate">
                                    <span>{{ $comment->user->name }}</span>
                                </td>
                                <td class="text-truncate">
                                    <span>{{ $comment->body }}</span>
                                </td>

                                <td>
                                    {{ verta($comment->created_at)->format('%d  %B   %Y') }}
                                </td>

                                <td wire:click="submitComment({{$comment->id}})" style="cursor: pointer">
                                    @if ($comment->status == 'approved')
                                        <div class="badge badge-success text-white">تایید شده</div>
                                    @elseif($comment->status == 'rejected')
                                        <div class="badge badge-danger">تایید نشده</div>
                                    @elseif($comment->status == 'draft')
                                        <div class="badge badge-warning">در انتظار تایید</div>
                                    @endif
                                </td>

                                <td style="display: flex;justify-content:center">

                                    <a class="p-0 text-danger" wire:click="deletecomment({{$comment->id}})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">کامنتی وجود ندارد</div>
            @endif
            {{ $comments->links() }}
        </div>
    </div>
</div>
@section('script')

    {{-- <script>
        window.addEventListener('deletecomment',event=>{
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
                    Livewire.emit('destroycomment',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script> --}}
@endsection
