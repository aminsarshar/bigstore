@extends('admin.layouts.master')

@section('title','دسته بندی مقالات')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4>دسته بندی مقالات</h4>

        <a
            href="{{ route('post-categories.create') }}"
            class="btn btn-success">

            افزودن دسته بندی

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

            <tr>

                <th>#</th>

                <th>عنوان</th>

                <th>اسلاگ</th>

                <th width="170">عملیات</th>

            </tr>

            </thead>

            <tbody>

            @forelse($categories as $category)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $category->title }}</td>

                    <td>{{ $category->slug }}</td>

                    <td>

                        <a
                            href="{{ route('post-categories.edit',$category) }}"
                            class="btn btn-sm btn-primary">

                            ویرایش

                        </a>

                        <form
                            action="{{ route('post-categories.destroy',$category) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-sm btn-danger">

                                حذف

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        دسته بندی وجود ندارد.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $categories->links() }}

    </div>

</div>

@endsection
