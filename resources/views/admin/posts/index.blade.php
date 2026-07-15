```blade
@extends('admin.layouts.master')

@section('title','مدیریت مقالات')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4>مدیریت مقالات</h4>

        <a href="{{ route('posts.create') }}" class="btn btn-success">

            <i class="fa fa-plus"></i>

            افزودن مقاله

        </a>

    </div>
<div class="row mb-3">

    <div class="col-md-5">

        <form method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="جستجوی عنوان مقاله...">

                <button class="btn btn-primary">

                    جستجو

                </button>

            </div>

        </form>

    </div>

</div>
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover text-center">

                <thead>

                <tr>

                    <th>#</th>

                    <th>تصویر</th>

                    <th>عنوان</th>

                    <th>دسته بندی</th>

                    <th>وضعیت</th>

                    <th>ویژه</th>

                    <th>بازدید</th>

                    <th>تاریخ</th>

                    <th width="170">عملیات</th>

                </tr>

                </thead>

                <tbody>

                @forelse($posts as $post)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>

                            @if($post->image)

                                <img
                                    src="{{ asset('admin/images/posts/'.$post->image) }}"
                                    width="70"
                                    class="rounded">

                            @endif

                        </td>

                        <td>

                            {{ $post->title }}

                        </td>

                        <td>

                            {{ $post->category?->title }}

                        </td>

                        <td>

                            @if($post->status)

                                <span class="badge badge-success">

                                    منتشر شده

                                </span>

                            @else

                                <span class="badge badge-danger">

                                    پیش نویس

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($post->is_featured)

                                ⭐

                            @else

                                -

                            @endif

                        </td>

                        <td>

                            {{ number_format($post->views) }}

                        </td>

                        <td>

                            {{ verta($post->created_at)->format('Y/m/d') }}

                        </td>

                        <td>

                            <a
                                href="{{ route('posts.edit',$post) }}"
                                class="btn btn-warning btn-sm">

                                ویرایش

                            </a>

                    <form
                        action="{{ route('posts.destroy',$post) }}"
                        method="POST"
                        class="delete-form d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm">

                            حذف

                        </button>

                    </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9">

                            مقاله‌ای ثبت نشده است.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $posts->links() }}

        </div>

    </div>

</div>

@endsection
```
@section('script')

<script>

$('.delete-form').submit(function(e){

    e.preventDefault();

    let form = this;

    Swal.fire({

        title: 'حذف مقاله؟',

        text: 'این عملیات قابل بازگشت نیست.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'بله حذف شود',

        cancelButtonText: 'انصراف',

        confirmButtonColor:'#d33',

        cancelButtonColor:'#3085d6'

    }).then((result)=>{

        if(result.isConfirmed){

            form.submit();

        }

    });

});

</script>

@endsection
