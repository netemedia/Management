<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reports',
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('project_id');
                $table->date('debut');
                $table->date('fin');
                $table->text('todo')->nullable();
                $table->text('doing')->nullable();
                $table->text('done')->nullable();
                $table->text('observations')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
