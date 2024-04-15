<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->string("name", 250);
            $table->string("slug", 250);
            $table->string("sku",30);
            $table->integer("price");
            $table->integer("compare_price");
            $table->timestamps();

            $table->index("product_id", "idx_product_id");
            $table->unique("sku", "unix_product_variants_sku");
            $table->softDeletes();

            $table->integer('qty');
            $table->tinyInteger("status")
                ->default(1)
                ->comment("1 là active, 0 là Disable");
            $table->string('sync_seo_content')->nullable();
            $table->string("link_iframe",200)->nullable();
            $table->index("status", "idx_status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variants');
    }
}
