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
            $table->text('description')->nullable();
            $table->enum('status', ['PENDING', 'ONGOING', 'COMPLETE'])->default("PENDING");
            $table->foreignId('created_by');
            $table->foreignId('assigned_to')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->float('lat')->nullable();
            $table->float('lon')->nullable();
            $table->string('location')->nullable();
            $table->float('amount', 8, 2)->nullable();
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
