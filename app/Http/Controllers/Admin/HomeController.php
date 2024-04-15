<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\OrderItem\OrderItemRepository;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }
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
        $totalEarning = $this->orderRepo->whereMonth('updated_at', $month)->sum('total_price');
        $orders = $this->orderRepo->whereMonth('updated_at', $month)->count();
        $newUser = $this->orderRepo->whereMonth('updated_at', $month)->distinct()->count('phone_number');
        $lastOrders = $this->orderRepo->whereMonth('updated_at', $month)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('admin.index', [
            'totalEarning' => $totalEarning,
            'orders' => $orders,
            'newUser' => $newUser,
            'lastOrders' => $lastOrders
        ]);
    }
}
