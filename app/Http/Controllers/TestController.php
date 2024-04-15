<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function init()
    {
        $api_key = 'SANDBOX.de33f0a9d11c680b5617';
        $secret_key = '39637d00be58586d';
        $shop_id = 86429; // Thay YOUR_SHOP_ID bằng shop_id của bạn

// Xây dựng chuỗi chữ ký xác thực
        $timestamp = time();
        $signature = hash_hmac('sha256', $shop_id . '|' . $timestamp, $secret_key);

// Tạo URL cho cuộc gọi API
        $url = 'https://banhang.test-stable.shopee.vn';
        $url .= '?shopid=' . $shop_id . '&timestamp=' . $timestamp . '&sign=' . $signature;

// Gửi yêu cầu API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

// Xử lý phản hồi từ Shopee
        if ($response) {
            echo 1;die;
            $data = json_decode($response, true);
            // Xử lý dữ liệu ở đây
        } else {
            echo 2;die;
            // Xử lý lỗi nếu có
        }
    }
}
