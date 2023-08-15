<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_p_e_s_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->nullable();
            $table->string('transaction_number')->nullable()->unique();
            $table->string('phone_number');
            $table->string('description');
            $table->double('amount')->default(0.00);
            $table->jsonb('payload')->default(json_encode([]));
            $table->tinyInteger('attempts')->default(0);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_withdrawn')->default(false);
            $table->boolean('is_successful')->default(false);
            $table->boolean('is_initiated')->default(false);
            $table->boolean('completed')->default(0);
            $table->boolean('confirmed')->default(0);
            $table->boolean('is_used')->default(false);
            $table->timestamp('queued_at');
            $table->timestamp('callback_received_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('m_p_e_s_a_s');
    }
};
