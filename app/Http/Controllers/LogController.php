<?php

namespace App\Http\Controllers;

class LogController extends Controller
{
    public function viewDailyLog()
    {
        // Lấy ngày hiện tại
        $today = now()->toDateString();

        // Tạo đường dẫn đến file log hàng ngày
        $dailyLogFile = storage_path('logs/laravel-' . $today . '.log');

        // Kiểm tra xem file log hàng ngày có tồn tại không
        if (file_exists($dailyLogFile)) {
            // Đọc nội dung log từ file log hàng ngày
            $logContent = file_get_contents($dailyLogFile);
        } else {
            // Nếu file log hàng ngày không tồn tại, gán nội dung log là chuỗi trống
            $logContent = '';
        }

        // Trả về view để hiển thị nội dung log hàng ngày
        return view('web.daily-log', ['logContent' => $logContent]);
    }
}
