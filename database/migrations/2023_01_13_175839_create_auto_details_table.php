<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('inspector_id')->nullable()->constrained('crews')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pic_id')->nullable()->constrained('crews')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('crew_id')->nullable()->constrained('crews')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date_down_payment')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('note_payment')->nullable();
            $table->bigInteger('paid_amount')->nullable();
            $table->bigInteger('minus_amount')->nullable();
            $table->string('fuel_total')->nullable();
            $table->string('front_left_tire')->nullable();
            $table->string('front_right_tire')->nullable();
            $table->string('back_left_tire')->nullable();
            $table->string('back_right_tire')->nullable();
            $table->string('spare_tire')->nullable();
            $table->string('other_condition')->nullable();
            $table->string('vehicle_note')->nullable();
            $table->string('damage_1')->nullable();
            $table->string('damage_2')->nullable();
            $table->string('damage_3')->nullable();
            $table->string('damage_4')->nullable();
            $table->string('damage_5')->nullable();
            $table->string('damage_6')->nullable();
            $table->string('damage_7')->nullable();
            $table->string('damage_8')->nullable();
            $table->string('damage_9')->nullable();
            $table->string('damage_10')->nullable();
            $table->string('estimate')->nullable();
            $table->string('warrant_notes')->nullable();
            $table->date('date_payment')->nullable();
            $table->string('receiver_payment')->nullable();
            $table->date('date_delivery')->nullable();
            $table->string('crew_delivery')->nullable();
            $table->string('receiver_delivery')->nullable();
            $table->string('delivery_evidence_1')->nullable();
            $table->string('delivery_evidence_2')->nullable();
            $table->string('delivery_evidence_3')->nullable();
            $table->string('delivery_evidence_4')->nullable();
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
        Schema::dropIfExists('auto_details');
    }
}
