@extends('admin.layouts.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">لیست سفارشات</h4>
        <a href="{{ route('orders.create') }}" class="btn btn-primary float-right">
            ثبت سفارش جدید
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>
                <tr>
                    <th>#</th>
                    <th>نام مشتری</th>
                    <th>شماره تماس</th>
                    <th>محصولات سفارش داده شده</th>
                    <th>مبلغ کل</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>
                </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>{{ $order->id }}</td>

                        <td>
                            {{ $order->customer_name }}
                        </td>

                        <td>
                            {{ $order->customer_phone }}
                        </td>

                        <td>

    @foreach($order->items as $item)

        <span class="badge badge-primary mb-1">

            {{ $item->product->title }}
            ×
            {{ $item->quantity }}

        </span>

        <br>

    @endforeach

</td>

                        <td>
                            {{ number_format($order->total_price) }}
                            تومان
                        </td>

                        <td>
                            {{ verta($order->created_at)->format('Y/m/d H:i') }}
                        </td>

                        <td>


                            <a href="{{ route('orders.invoice',$order->id) }}"
                               class="btn btn-success btn-sm">
                                چاپ فاکتور
                            </a>

<form action="{{ route('orders.destroy',$order->id) }}"
      method="POST"
      class="d-inline delete-form">

    @csrf
    @method('DELETE')

    <button type="button"
            class="btn btn-danger btn-sm delete-btn">

        حذف

    </button>

</form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            سفارشی ثبت نشده است
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $orders->links() }}
        </div>

    </div>
</div>

@endsection

@section('script')

<script>

$(document).on('click','.delete-btn',function () {

    let form = $(this).closest('.delete-form');

    Swal.fire({
        title: 'حذف سفارش',
        text: "آیا از حذف این سفارش مطمئن هستید؟",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'بله، حذف شود',
        cancelButtonText: 'انصراف'

    }).then((result) => {

        if (result.isConfirmed) {

            form.submit();

        }

    });

});

</script>

@endsection
