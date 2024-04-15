<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarrantyKeyToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            // Tạo cột warranty_id
            $table->unsignedBigInteger('warranty_id')->nullable();

            // Tạo ràng buộc ngoại tham chiếu đến bảng warranties
            $table->foreign('warranty_id')->references('id')->on('warranties')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            // Xóa ràng buộc ngoại và cột warranty_id nếu cần
            $table->dropForeign(['warranty_id']);
            $table->dropColumn('warranty_id');
        });
    }
}
