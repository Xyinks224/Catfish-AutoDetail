<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateInspectionInVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->date('date_inspection')->after('received_date')->nullable();
        });

        Schema::table('auto_details', function (Blueprint $table) {
            $table->date('date_inspection')->after('minus_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('date_inspection');
        });

        Schema::table('auto_details', function (Blueprint $table) {
            $table->dropColumn('date_inspection');
        });
    }
}
