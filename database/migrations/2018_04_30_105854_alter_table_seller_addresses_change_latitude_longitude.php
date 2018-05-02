<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSellerAddressesChangeLatitudeLongitude extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_addresses', function (Blueprint $table) {
            $table->double('longitude',10,7)->nullable()->change();
            $table->double('latitude',10,7)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_addresses', function (Blueprint $table) {
            $table->decimal('longitude')->nullable();
            $table->decimal('latitude')->nullable();
        });
    }
}
