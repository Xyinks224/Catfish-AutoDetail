<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('crew_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->enum('type', ['2_wheels', '4_wheels'])->nullable();
            $table->string('year')->nullable();
            $table->integer('km')->nullable();
            $table->date('received_date')->nullable();
            $table->longText('vehicle_equipment')->nullable();
            $table->string('exterior_front')->nullable();
            $table->string('back_exterior')->nullable();
            $table->string('exterior_front_right')->nullable();
            $table->string('exterior_front_left')->nullable();
            $table->string('exterior_back_right')->nullable();
            $table->string('exterior_back_left')->nullable();
            $table->string('interior_dashboard')->nullable();
            $table->string('interior_spedometer')->nullable();
            $table->string('interior_front_seat')->nullable();
            $table->string('interior_back_seat')->nullable();
            $table->string('interior_front_window')->nullable();
            $table->string('interior_right_window')->nullable();
            $table->string('interior_left_window')->nullable();
            $table->string('interior_back_window')->nullable();
            $table->string('interior_back_right_window')->nullable();
            $table->string('interior_back_left_window')->nullable();
            $table->string('interior_trunk_window')->nullable();
            $table->string('trunk')->nullable();
            $table->string('engine')->nullable();
            $table->string('jack')->nullable();
            $table->longText('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
