<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOndemandRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ondemand_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('frequency', ['DAILY', 'ONE_TIME'])->nullable();
            $table->enum('way', ['ONE_WAY', 'TWO_WAYS'])->nullable();
            $table->enum('classification', ['EDUCATIONAL', 'CORPORATE', 'INDIVIDUAL', 'GROUP'])->nullable();
            $table->boolean('find_people')->default(0);
            $table->string('contact_phone')->nullable();
            $table->unsignedInteger('no_of_users')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date'); 
            $table->string('custom_vehicle')->nullable();
            $table->enum('status', [
                'ACCEPTED', 
                'REJECTED',
                'CANCELLED',
                'PENDING'
            ])->default('PENDING');
            $table->string('comment')->nullable();
            $table->string('response')->nullable();
            $table->timestamps(); 
            $table->timestamp('read_at')->nullable();
            
            $table->softDeletes();

            $table->index('created_at');
            $table->index('user_id');
            $table->index('status');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ondemand_requests');
    }
}
