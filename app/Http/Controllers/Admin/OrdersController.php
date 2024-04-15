<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wards;
use App\Models\Orders;
use App\Models\District;
use App\Models\Province;
use Laracasts\Flash\Flash;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrdersStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\Orders\OrdersRepository;
use App\Http\Requests\Orders\OrdersUpdateRequest;
use App\Models\OrderItem;
use App\Repositories\District\DistrictRepository;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Wards\WardsRepository;

class OrdersController extends Controller
{
    protected $orderRepo;
    protected $orderItemRepo;
    protected $wardsRepo, $provincesRepo, $districtsRepo;
    public function __construct(OrdersRepository $orderRepo ,OrderItemRepository $orderItemRepo ,
    ProvinceRepository $provincesRepo ,DistrictRepository $districtRepo ,WardsRepository $wardsRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->orderItemRepo = $orderItemRepo;
        $this->provincesRepo = $provincesRepo;
        $this->districtsRepo = $districtRepo;
        $this->wardsRepo = $wardsRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->orderRepo->with(['items']);
        if(isset($request['time_start']) && !empty($request['time_start'])){
            $time_start = date("Y-m-d H:i:s", strtotime($request['time_start']));
            $query = $query->where('created_at', ">" ,$time_start);
        }

        if(isset($request['time_end']) &&  !empty($request['time_end']) ){
            $time_end = date("Y-m-d H:i:s", strtotime($request['time_end']));
            $query = $query->where('created_at', "<=", $time_end);
        }
        
		if (isset($request["payment_status"]) && $request["payment_status"] > 0)
			$query = $query->where("payment_status", $request["payment_status"]);

		if (isset($request["payment_method"]) && $request["payment_method"] > 0)
			$query = $query->where("payment_method", $request["payment_method"]);
        $orders = $query->orderBy('created_at', 'DESC')->paginate(15);
		$count =$query->count();
        return view('admin.orders.index')
			->with('count', $count)
            ->with('orders', $orders);
    }
    /**
     * Display the specified Orders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orders = $this->orderRepo->find($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        $provinces = $this->provincesRepo->all();
        $districts = $this->districtsRepo->where("province_id", $orders->province_id)->get();
        $wards = $this->wardsRepo->where("district_id", $orders->district_id)->get();

        return view('admin.orders.show')
            ->with('districts', $districts)
            ->with('provinces', $provinces)
            ->with('wards', $wards)
            ->with('order', $orders);
    }

    /**
     * Show the form for editing the specified Orders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepo->find($id);
        if (empty($order)) {
            Flash::error('Orders not found');
            return redirect(route('orders.index'));
        }
        $provinces = $this->provincesRepo->all();
        $districts = $this->districtsRepo->all();
        $wards = $this->wardsRepo->all();
        return view('admin.orders.edit')
            ->with("provinces", $provinces)
            ->with("districs", $districts)
            ->with("wards", $wards)
            ->with('order', $order);
    }

    public function postUpdate(OrdersStoreRequest $request , $id)
    {
        try{
            $param = $request->validated();
            $param['ward_id'] = $request->wards_id;
            $order = $this->orderRepo->find($id);
            if (empty($order)) {
                Flash::error('Order not found');
                return redirect(route('orders.index'));
            }
            $order->update($param);
            Flash::success('Order updated successfully');
            return redirect(route('orders.index'));
        }catch(\Exception $e){
            Flash::error('Fail');
            Log::error($e);
            return redirect(route('orders.index'));
        }
    }
  /**
     * Show the form for editing the specified Orders.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $order = $this->orderRepo->find($id);
            if (empty($order)) {
                Flash::error('Order not found');
                return;
            }
            $this->orderItemRepo->where('order_id', $order->id)->delete();
            $order->delete($id);
            Flash::success('Order updated successfully.');

            return redirect(route('orders.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
	public function export()
	{
		return Excel::download(new OrderExport, 'order.xlsx');
	}
}
