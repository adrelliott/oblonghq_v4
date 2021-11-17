<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id()->from(1977);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->text('notes')->nullable();
            $table->integer('type_id')->default(1);
            $table->foreignId('client_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
