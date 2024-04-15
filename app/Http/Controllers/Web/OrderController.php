<?php


//
namespace App\Http\Controllers\Web;

use App\Jobs\UpdateOrder;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Orders\OrdersRepository;
use App\Http\Requests\Orders\OrdersStoreRequest;
use App\Repositories\OrderItem\OrderItemRepository;

class OrderController extends Controller
{
    protected $orderRepo, $orderItemRepo;
    public function __construct(OrdersRepository $orderRepo, OrderItemRepository $orderItemRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderItemRepo = $orderItemRepo;
    }

    public function addOrder(OrdersStoreRequest $request)
    {
        $cart = session()->get('cart');
        $totalQty = session()->get('totalQty');
        $params = $request->validated();
        $params['amount'] = $totalQty;
        try {
            DB::beginTransaction();
            $order = $this->orderRepo->create($params);
            foreach ($cart  as $item) {
                $item['order_id'] = $order->id;
                $orderItem = $this->orderItemRepo->create($item);
                if (!empty($item['size'])) {
                    $orderItem->size = $this->orderItemRepo->update( [
                        'size' => $item['size'],
                    ] , $item['order_id'],);
                }
            };
            UpdateOrder::dispatch($order->id, '1');
            DB::commit();
            session()->forget('cart');
            Flash::success('Đặt hàng thành công');
            $dataOrder = $this->orderRepo->latest('created_at')->first();
            $dataOrderItem = $this->orderItemRepo->whereHas('order' , function($query) use ($dataOrder) {
                $query->where('id' , $dataOrder->id);
            })->get();

            $order =  $this->orderRepo->with('province','district','ward')->with('items.product.images')->find($dataOrder->id);
            Mail::send('emails.order_email_confirm', compact('order'), function($email) use($order) {
             $email->to("$order->email","$order->phone_number");
        });
            return view('web.cart.order_success' , ['dataOrder' => $dataOrder , 'dataOrderItem'=>$dataOrderItem]);
        } catch (\Exception $e) {
            Log::error($e);
            Flash::error('Đặt hàng không thành công');
            return redirect()->back();
        }
    }
}
