<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function daily()
    {
        $salesChart = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i);

            $total = Order::whereDate('created_at', $date)
                ->sum('total_price');

            $salesChart[] = [
                'date' => verta($date)->format('m/d'),
                'total' => $total
            ];
        }
        $orders = Order::with('items.product')
            ->whereDate('created_at', today())
            ->latest()
            ->get();

        $totalSales = $orders->sum('total_price');

        $totalOrders = $orders->count();

        $totalItems = OrderItem::whereDate('created_at', today())
            ->sum('quantity');

        $bestProducts = OrderItem::select(
            'product_id',
            DB::raw('SUM(quantity) as total_quantity'),
            DB::raw('SUM(quantity * price) as total_amount')
        )
            ->with('product')
            ->whereDate('created_at', today())
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->get();

        return view('admin.reports.daily', compact(
            'orders',
            'totalSales',
            'totalOrders',
            'totalItems',
            'bestProducts',
            'salesChart'
        ));
    }


}
