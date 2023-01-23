<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleConditionInAutoDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto_details', function (Blueprint $table) {
            $table->string('vehicle_condition')->nullable()->after('receiver_delivery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auto_details', function (Blueprint $table) {
            $table->dropColumn('vehicle_condition');
        });
    }
}
