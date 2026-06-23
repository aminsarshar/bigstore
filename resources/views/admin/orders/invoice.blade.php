<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>فاکتور سفارش</title>

    <style>
        @font-face {
            font-family: Dana;
            src: url(asset('front/fonts/Dana/woff2/DanaFaNum-Medium.woff2'));

        }

        @font-face {
            font-family: DanaBold;
            src: url(asset('front/fonts/Dana/woff2/DanaFaNum-Regular.woff2'));
        }

        @font-face {
            font-family: Mabna;
            src: url(asset('front/fonts/Morabba/woff2/Morabba-Bold.woff2'));
        }

        * {
            box-sizing: border-box;
        }

        body {
            width: 80mm;
            margin: auto;
            color: #000;
            direction: rtl;
            background: white;
            font-family: Mabna;
            font-size: 13px;
        }

        .center {
            text-align: center;
        }

        .title {
            font-size: 22px;
            font-family: DanaBold;
            margin-top: 5px;
        }

        .sub-title {
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .line {
            border-top: 1px dashed #555;
            margin: 10px 0;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-family: DanaBold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            border-bottom: 1px solid #000;
            padding: 5px;
            font-family: DanaBold;
        }

        table td {
            padding: 6px 0;
            text-align: center;
            border-bottom: 1px dashed #ccc;
        }

        .total {
            margin-top: 15px;
            font-family: DanaBold;
            font-size: 18px;
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            line-height: 35px;
        }

        .message {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }

        .print-btn {
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
            border: none;
            background: #198754;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        @media print {

            .print-btn {
                display: none;
            }

            body {
                width: 80mm;
            }

        }
    </style>

</head>

<body>

<button class="print-btn" onclick="window.print()">
    چاپ فاکتور
</button>

<div class="center">

    <img src="" alt="">

    {{-- لوگو --}}
    {{-- <img src="{{ asset('images/logo.png') }}" width="70"> --}}

    <div class="title">
        رستوران باران
    </div>

    <div class="sub-title">
        غذای سریع و خوشمزه
    </div>

</div>

<div class="info">
    <div>
        شماره: {{ $order->id }}
    </div>

    <div>
        {{ verta($order->created_at)->format('Y/m/d-H:i') }}
    </div>
</div>

<div class="line"></div>

<table>

    <thead>
    <tr>
        <th>سفارش</th>
        <th>تعداد</th>
        <th>قیمت</th>
    </tr>
    </thead>

    <tbody>

    @foreach($order->items as $item)

        <tr>

            <td>
                {{ $item->product->title }}
            </td>

            <td>
                {{ $item->quantity }}
            </td>

            <td>
                {{ number_format($item->price * $item->quantity) }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

<div class="line"></div>

@if($order->customer_name)

<div>
    مشتری :
    {{ $order->customer_name }}
</div>

@endif

<div class="total">

    مجموع :
    {{ number_format($order->total_price) }}
    تومان

</div>

<div class="line"></div>

<div class="footer">

    *** بیرون بر ***

    <br>

    با تشکر از خرید شما

</div>

<div class="message">

    لطفا فاکتور خود را تا پایان سفارش نزد خود نگه دارید.

</div>

<script>
    window.onload = function () {
        window.print();
    }
</script>

</body>
</html>
