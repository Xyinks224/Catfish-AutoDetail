<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDateInspectionInAutoDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto_details', function (Blueprint $table) {
            $table->renameColumn('date_inspection', 'inspection_date');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('date_inspection');
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
            $table->renameColumn('inspection_date', 'date_inspection');
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->date('date_inspection')->nullable();
        });
    }
}
