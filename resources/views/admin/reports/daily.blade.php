@extends('admin.layouts.master')

@section('content')


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>

    .stat-card{
    border-radius: 20px;
    overflow: hidden;
    color: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,.15);
    transition: all .3s ease;
}

.stat-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,.25);
}

.sales-card{
    background: linear-gradient(135deg,#00c853,#00e676);
}

.order-card{
    background: linear-gradient(135deg,#2196f3,#00b0ff);
}

.item-card{
    background: linear-gradient(135deg,#ff9800,#ffb300);
}

.card-body{
    padding: 50px;
}

.title{
    font-size: 24px;
    opacity: .8;
    color: white
}

.value{
    font-size: 30px;
    font-weight: 700;
    margin: 0;
    color: rgb(245, 245, 245)

}

.value small{
    font-size: 15px;
    opacity: .8;
}

.icon-box{
    width: 65px;
    height: 65px;
    border-radius: 18px;
    background: rgba(255,255,255,.15);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
}
</style>
<div class="row g-4">

    <!-- فروش امروز -->
    <div class="col-md-4">
        <div class="card stat-card sales-card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center" style="padding: 15px">
                    <div>
                        <p class="title mb-2">فروش امروز</p>
                        <h3 class="value">
                            {{ number_format($totalSales) }}
                            <small>تومان</small>
                        </h3>
                    </div>

                    <div class="icon-box">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>
  </div>

    <!-- تعداد سفارشات -->
    <div class="col-md-4">
        <div class="card stat-card order-card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center" style="padding: 15px">
                    <div>
                        <p class="title mb-2">تعداد سفارشات</p>
                        <h3 class="value">{{ $totalOrders }}</h3>
                    </div>

                    <div class="icon-box">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- آیتم فروخته شده -->
    <div class="col-md-4">
        <div class="card stat-card item-card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center" style="padding: 15px">
                    <div>
                        <p class="title mb-2">آیتم فروخته شده</p>
                        <h3 class="value">{{ $totalItems }}</h3>
                    </div>

                    <div class="icon-box">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card mt-3">

    <div class="card-header">
        <h4>جزئیات سفارش‌ها</h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                <tr>

                    <th>#</th>
                    <th>مشتری</th>
                    <th>محصولات</th>
                    <th>تعداد کل آیتم</th>
                    <th>مبلغ</th>
                    <th>ساعت</th>
                    <th>عملیات</th>

                </tr>

                </thead>

                <tbody>

                @foreach($orders as $order)

                    <tr>

                        <td>
                            {{ $order->id }}
                        </td>

                        <td>
                            {{ $order->customer_name ?: 'مشتری حضوری' }}
                        </td>

                        <td>

                            @foreach($order->items as $item)

                                <span class="badge badge-primary mb-1">

                                    {{ $item->product->title }}

                                    ×

                                    {{ $item->quantity }}

                                </span>

                            @endforeach

                        </td>

                        <td>

                            {{ $order->items->sum('quantity') }}

                        </td>

                        <td>

                            {{ number_format($order->total_price) }}

                            تومان

                        </td>

                        <td>

                            {{ verta($order->created_at)->format('H:i') }}

                        </td>

                        <td>

                            <a href="{{ route('orders.invoice',$order->id) }}"
                               target="_blank"
                               class="btn btn-success btn-sm">

                                چاپ فاکتور

                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>
<div class="card mt-3">

    <div class="card-header">
        <h4>پرفروش‌ترین محصولات امروز</h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                <tr>
                    <th>ردیف</th>
                    <th>محصول</th>
                    <th>تعداد فروش</th>
                    <th>مبلغ فروش</th>
                </tr>

                </thead>

                <tbody>

                @forelse($bestProducts as $product)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            {{ $product->product->title }}

                        </td>

                        <td>

                            <span class="badge badge-success">

                                {{ $product->total_quantity }}

                            </span>

                        </td>

                        <td>

                            {{ number_format($product->total_amount) }}

                            تومان

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            فروشی ثبت نشده است

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="card mt-3">

    <div class="card-header">
        <h4>نمودار فروش ۷ روز اخیر</h4>
    </div>

    <div class="card-body">

        <canvas id="salesChart" height="100"></canvas>

    </div>

</div>

<div class="card mt-3">

    <div class="card-header">
        <h4>نمودار پرفروش‌ترین محصولات</h4>
    </div>

    <div class="card-body">

        <canvas id="bestProductsChart" height="100"></canvas>

    </div>

</div>

<div class="row mt-3">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h4>مقایسه فروش امروز با دیروز</h4>
            </div>

            <div class="card-body">

                <div class="row text-center">

                    <div class="col-md-4">

                        <h5>فروش امروز</h5>

                        <h3 class="text-success">

                            {{ number_format($totalSales) }}

                        </h3>

                    </div>

                    <div class="col-md-4">

                        <h5>فروش دیروز</h5>

                        <h3 class="text-primary">

                            {{ number_format($yesterdaySales) }}

                        </h3>

                    </div>

                    <div class="col-md-4">

                        <h5>تغییر فروش</h5>

                        @if($difference >= 0)

                            <h3 class="text-success">

                                ▲ {{ number_format($difference) }}

                                <br>

                                {{ $growthPercent }}%

                            </h3>

                        @else

                            <h3 class="text-danger">

                                ▼ {{ number_format(abs($difference)) }}

                                <br>

                                {{ abs($growthPercent) }}%

                            </h3>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [
            @foreach($salesChart as $day)
                "{{ $day['date'] }}",
            @endforeach
        ],

        datasets: [{

            label: 'فروش',

            data: [
                @foreach($salesChart as $day)
                    {{ $day['total'] }},
                @endforeach
            ],

            borderWidth: 3,
            fill: false,
            tension: .4

        }]

    }

});

</script>
<script>
const bestProductsCtx = document.getElementById('bestProductsChart');

new Chart(bestProductsCtx, {

    type: 'bar',

    data: {

        labels: [
            @foreach($bestProducts as $item)
                "{{ $item->product->title }}",
            @endforeach
        ],

        datasets: [{

            label: 'تعداد فروش',

            data: [
                @foreach($bestProducts as $item)
                    {{ $item->total_quantity }},
                @endforeach
            ],

            backgroundColor: [
                '#4CAF50',
                '#2196F3',
                '#FFC107',
                '#E91E63',
                '#9C27B0',
                '#FF5722',
                '#00BCD4',
                '#795548',
                '#607D8B',
                '#8BC34A'
            ],

            borderColor: [
                '#388E3C',
                '#1976D2',
                '#FFA000',
                '#C2185B',
                '#7B1FA2',
                '#E64A19',
                '#0097A7',
                '#5D4037',
                '#455A64',
                '#689F38'
            ],

            borderWidth: 1,

            // عرض میله‌ها
            barThickness: 25,
            maxBarThickness: 30,
            categoryPercentage: 0.6,
            barPercentage: 0.7,

            borderRadius: 8

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: false
            }

        },

        scales: {

            y: {
                beginAtZero: true
            }

        }

    }

});
</script>

<script>

kamaDatepicker('from_date',{
    buttonsColor: "blue",
    forceFarsiDigits:true
});

kamaDatepicker('to_date',{
    buttonsColor: "blue",
    forceFarsiDigits:true
});

</script>
@endsection
