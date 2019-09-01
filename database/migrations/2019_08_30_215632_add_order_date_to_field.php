<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderDateToField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_prices', function (Blueprint $table) {
            $table->date('order_date_to')->nullable()->after('order_date_from');
            $table->date('delivery_date_to')->nullable()->after('delivery_date_from');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_prices', function (Blueprint $table) {
            $table->dropColumn('order_date_to');
            $table->dropColumn('delivery_date_to');
        });
    }
}
