<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 80)->after('password')
                        ->unique()
                        ->nullable()
                        ->default(null);
            $table->foreignId('party_id');
            $table->enum('type', ['ADMIN', 'HANDYMAN', 'CLIENT']);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('party_id')->references('id')->on('parties');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
