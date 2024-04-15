<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection ,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function collection()
    {
        return Orders::orderBy('created_at', 'DESC')->get(['order_code', 'affiliate_user', 'phone_number', 'province_id', 'district_id', 'ward_id', 'address', 'description', 'amount',  'payment_method', 'payment_status','email', 'total_price', 'note', 'created_at', 'updated_at']);
       
    }
    public function headings(): array {
        return [
            'Mã đơn hàng',
            'Tên người đặt hàng',
            'SĐT',
            'Mã tỉnh',
            'Mã huyện',
            'Mã xã',
            'Địa chỉ',
            'Mô tả',
            'Số lượng SP',
            'Phương thức thanh toán',
            'Trạng thái thanh toán',
            'email',
            'Tổng giá trị đơn hàng',
            'note',
            'Thời điển tạo đơn',
            'Thời điểm cập nhật'
        ];
    }
 
    public function map($order): array {
        return [
            $order->order_code,
            $order->affiliate_user,
            $order->phone_number,
            $order->province_id,
            $order->district_id,
            $order->ward_id,
            $order->address,
            $order->description,
            $order->amount,
            $order->payment_method,
            $order->payment_status,
            $order->email,
            $order->total_price,
            $order->note,
            $order->created_at,
            $order->updated_at
        ];
    }
}
