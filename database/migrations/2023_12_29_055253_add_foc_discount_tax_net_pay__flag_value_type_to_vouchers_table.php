<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFocDiscountTaxNetPayFlagValueTypeToVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->tinyInteger('foc_flag')->default(0);
            $table->Integer('foc_value')->nullable();
            $table->tinyInteger('discount_flag')->default(0);
            $table->tinyInteger('tax_flag')->default(0);
            $table->Integer('tax_value')->nullable();
            $table->Integer('net_price')->nullable();
            $table->tinyInteger('pay_type')->default(0);
            $table->Integer('service_charges')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            //
        });
    }
}
