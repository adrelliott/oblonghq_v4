<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id()->from(1984);;
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('intro_page')->nullable();
            $table->text('outro_page')->nullable();
            // $table->integer('current_step_no')->default(1);
            $table->boolean('is_template')->default(0);
            $table->boolean('has_sections')->default(0);
            $table->foreignId('client_id')->nullable()->constrained();
            $table->foreignId('tenant_id')->nullable()->constrained();
            $table->timestamp('opens_at')->nullable();
            $table->timestamp('closes_at')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
