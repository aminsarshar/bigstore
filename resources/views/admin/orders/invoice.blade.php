<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>فاکتور</title>

<style>

body{
    font-family:tahoma;
    width:80mm;
    margin:auto;
    text-align:center;
    font-size:14px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th,
table td{
    border:1px solid #000;
    padding:5px;
}

.line{
    border-top:1px dashed #000;
    margin:10px 0;
}

@media print{

button{
display:none;
}

body{
width:80mm;
}

}

</style>

</head>
<body>

<button onclick="window.print()">چاپ فاکتور</button>

<h2>رستوران باران</h2>

<h4>غذای سریع و خوشمزه</h4>

<div>

شماره :
{{ $order->id }}

&nbsp;&nbsp;&nbsp;

{{ verta($order->created_at)->format('Y/m/d-H:i') }}

</div>

<br>

<table>

<thead>

<tr>
    <th>سفارش</th>
    <th>تعداد</th>
    <th>قیمت کل</th>
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
        {{ number_format($item->quantity * $item->price) }}
    </td>

</tr>

@endforeach

</tbody>

</table>

<br>

<div style="text-align:right">

نام مشتری :

{{ $order->customer_name ?? 'مشتری حضوری' }}

</div>

<div class="line"></div>

<h3>

مجموع :

{{ number_format($order->total_price) }}

تومان

</h3>

<div class="line"></div>

<div>

*** بیرون بر ***

<br>

با تشکر از خرید شما

</div>

<br>

<div style="border:1px solid #000;padding:10px">

لطفا فاکتور خود را تا پایان سفارش نزد خود نگه دارید.

</div>

</body>
</html>
