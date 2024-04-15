<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\OrderItem\OrderItemRepository;

class DashboardController extends Controller
{
    protected $orderRepo;
    protected $orderItemRepo;
    public function __construct(OrdersRepository $orderRepo, OrderItemRepository $orderItemRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderItemRepo = $orderItemRepo;
    }
    public function index()
    {
        $month = date('n');
        $totalEarning = $this->orderRepo->where('payment_status', 2)->whereMonth('updated_at', $month)->sum('total_price');
        $orders = $this->orderRepo->whereMonth('updated_at', $month)->count();
        $newUser = $this->orderRepo->whereMonth('updated_at', $month)->distinct()->count('phone_number');
        $lastOrders = $this->orderRepo->whereMonth('updated_at', $month)->orderBy('created_at', 'DESC')->take(10)->get();
        return view('admin.index', [
            'totalEarning' => $totalEarning,
            'orders' => $orders,
            'newUser' => $newUser,
            'lastOrders' => $lastOrders
        ]);
    }
}
