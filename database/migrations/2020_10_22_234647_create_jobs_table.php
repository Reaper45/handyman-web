<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['PENDING', 'ONGOING', 'COMPLETE', 'CANCELED'])->default("PENDING");
            $table->float('lat')->nullable();
            $table->float('lon')->nullable();
            $table->string('location')->nullable();
            $table->text('extra')->nullable();
            $table->date('scheduled_date', 0)->nullable();
            $table->time('scheduled_time', 0)->nullable();

            $table->foreignId('created_by');
            $table->foreignId('assigned_to')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->foreignId('category_id')->nullable();

            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('parties');
            $table->foreign('assigned_to')->references('id')->on('parties');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
